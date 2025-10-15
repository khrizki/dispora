<?php

namespace App\Http\Controllers;

use App\Models\PsuContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PsuContentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = PsuContent::orderBy('order', 'asc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $badge = $row->is_active 
                        ? '<span class="badge bg-success">Aktif</span>' 
                        : '<span class="badge bg-secondary">Nonaktif</span>';
                    return $badge;
                })
                ->addColumn('published', function ($row) {
                    $badge = $row->is_published 
                        ? '<span class="badge bg-primary">Dipublikasi</span>' 
                        : '<span class="badge bg-warning">Draft</span>';
                    return $badge;
                })
                ->addColumn('type_badge', function ($row) {
                    $colors = [
                        'program' => 'primary',
                        'statistic' => 'success',
                        'report' => 'warning',
                        'gallery' => 'info',
                        'info' => 'secondary'
                    ];
                    $color = $colors[$row->content_type] ?? 'secondary';
                    return '<span class="badge bg-'.$color.'">'.ucfirst($row->content_type).'</span>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl   = route('pages.psu-contents.edit', $row->id);
                    $deleteUrl = route('pages.psu-contents.destroy', $row->id);

                    return '
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="delete-form">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['status', 'published', 'type_badge', 'action'])
                ->make(true);
        }

        return view('pages.psu-contents.index');
    }

    public function create()
    {
        return view('pages.psu-contents.create');
    }

    public function store(Request $request)
    {
        try {
            // Log request untuk debug
            Log::info('PSU Store Request:', $request->all());
            Log::info('PSU Files:', $request->allFiles());

            // Validasi dasar
            $validated = $request->validate([
                'section_key' => 'required|string|max:255|unique:psu_contents,section_key',
                'section_title' => 'required|string|max:255',
                'content_type' => 'required|in:program,statistic,report,gallery,info',
                'order' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            // Set default values
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            $validated['is_published'] = $request->has('is_published') ? 1 : 0;
            $validated['order'] = $request->order ?? 0;
            $validated['data'] = null;

            // Handle berdasarkan tipe konten
            if ($request->content_type === 'program') {
                $programData = [
                    'category' => $request->input('category', ''),
                    'location' => $request->input('location', ''),
                    'budget' => $request->input('budget', 0),
                    'progress' => $request->input('progress', 0),
                    'status' => $request->input('status', 'planning'),
                    'start_date' => $request->input('start_date'),
                    'target_date' => $request->input('target_date'),
                    'contractor' => $request->input('contractor', ''),
                    'images' => []
                ];

                // Upload images jika ada
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $programData['images'][] = $image->store('psu/programs', 'public');
                    }
                }

                $validated['data'] = json_encode($programData);
            }
            
            elseif ($request->content_type === 'gallery') {
                $galleryData = [];

                if ($request->has('gallery')) {
                    foreach ($request->gallery as $index => $item) {
                        // Skip jika semua field kosong
                        if (empty($item['title']) && empty($item['description'])) {
                            continue;
                        }

                        $galleryItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'location' => $item['location'] ?? '',
                            'date' => $item['date'] ?? '',
                            'image' => ''
                        ];

                        // Upload image
                        if ($request->hasFile("gallery.{$index}.image")) {
                            $file = $request->file("gallery.{$index}.image");
                            $galleryItem['image'] = $file->store('psu/gallery', 'public');
                        }

                        $galleryData[] = $galleryItem;
                    }
                }

                $validated['data'] = json_encode($galleryData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'report') {
                $reportData = [];

                if ($request->has('report')) {
                    foreach ($request->report as $index => $item) {
                        // Skip jika title kosong
                        if (empty($item['title'])) {
                            continue;
                        }

                        $reportItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'report_date' => $item['report_date'] ?? '',
                            'file_type' => '',
                            'file' => ''
                        ];

                        // Upload file
                        if ($request->hasFile("report.{$index}.file")) {
                            $file = $request->file("report.{$index}.file");
                            $reportItem['file'] = $file->store('psu/reports', 'public');
                            $reportItem['file_type'] = $file->getClientOriginalExtension();
                        }

                        $reportData[] = $reportItem;
                    }
                }

                $validated['data'] = json_encode($reportData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'statistic') {
                $statisticData = [
                    'total_programs' => $request->input('total_programs', 0),
                    'ongoing_programs' => $request->input('ongoing_programs', 0),
                    'completed_programs' => $request->input('completed_programs', 0),
                    'total_locations' => $request->input('total_locations', 0),
                    'total_budget' => $request->input('total_budget', 0),
                    'year' => $request->input('year', date('Y')),
                ];

                $validated['data'] = json_encode($statisticData);
                $validated['content'] = null;
            }
            
            else {
                // Untuk info/text
                $validated['data'] = null;
            }

            // Create record
            $psuContent = PsuContent::create($validated);

            Log::info('Created PSU Record:', $psuContent->toArray());

            return redirect()
                ->route('pages.psu-contents.index')
                ->with('success', 'Konten PSU berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('PSU Store Error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(PsuContent $psuContent)
    {
        return view('pages.psu-contents.edit', compact('psuContent'));
    }



    public function update(Request $request, $id)
    {
        try {
            // Log request untuk debug
            Log::info('PSU Update Request:', $request->all());
            Log::info('PSU Files:', $request->allFiles());

            // Validasi dasar
            $validated = $request->validate([
                'section_key' => 'required|string|max:255|unique:psu_contents,section_key,'.$id,
                'section_title' => 'required|string|max:255',
                'content_type' => 'required|in:program,statistic,report,gallery,info',
                'order' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            $psuContent = PsuContent::findOrFail($id);

            // Set default values
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            $validated['is_published'] = $request->has('is_published') ? 1 : 0;
            $validated['order'] = $request->order ?? 0;

            // Handle berdasarkan tipe konten
            if ($request->content_type === 'program') {
                $programData = [
                    'category' => $request->input('category', ''),
                    'location' => $request->input('location', ''),
                    'budget' => $request->input('budget', 0),
                    'progress' => $request->input('progress', 0),
                    'status' => $request->input('status', 'planning'),
                    'start_date' => $request->input('start_date'),
                    'target_date' => $request->input('target_date'),
                    'contractor' => $request->input('contractor', ''),
                    'images' => json_decode($psuContent->data, true)['images'] ?? []
                ];

                // Upload new images jika ada
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $programData['images'][] = $image->store('psu/programs', 'public');
                    }
                }

                $validated['data'] = json_encode($programData);
            }
            
            elseif ($request->content_type === 'gallery') {
                $galleryData = [];

                if ($request->has('gallery')) {
                    foreach ($request->gallery as $index => $item) {
                        // Skip jika semua field kosong
                        if (empty($item['title']) && empty($item['description'])) {
                            continue;
                        }

                        $galleryItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'location' => $item['location'] ?? '',
                            'date' => $item['date'] ?? '',
                            'image' => ''
                        ];

                        // Handle image upload
                        if ($request->hasFile("gallery.{$index}.image")) {
                            // Hapus image lama jika ada
                            if (!empty($item['image_old'])) {
                                Storage::disk('public')->delete($item['image_old']);
                            }
                            
                            $file = $request->file("gallery.{$index}.image");
                            $galleryItem['image'] = $file->store('psu/gallery', 'public');
                        } else {
                            // Gunakan image lama
                            $galleryItem['image'] = $item['image_old'] ?? '';
                        }

                        $galleryData[] = $galleryItem;
                    }
                }

                $validated['data'] = json_encode($galleryData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'report') {
                $reportData = [];

                if ($request->has('report')) {
                    foreach ($request->report as $index => $item) {
                        // Skip jika title kosong
                        if (empty($item['title'])) {
                            continue;
                        }

                        $reportItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'report_date' => $item['report_date'] ?? '',
                            'file_type' => '',
                            'file' => ''
                        ];

                        // Handle file upload
                        if ($request->hasFile("report.{$index}.file")) {
                            // Hapus file lama jika ada
                            if (!empty($item['file_old'])) {
                                Storage::disk('public')->delete($item['file_old']);
                            }
                            
                            $file = $request->file("report.{$index}.file");
                            $reportItem['file'] = $file->store('psu/reports', 'public');
                            $reportItem['file_type'] = $file->getClientOriginalExtension();
                        } else {
                            // Gunakan file lama
                            $reportItem['file'] = $item['file_old'] ?? '';
                            $reportItem['file_type'] = $item['file_type_old'] ?? '';
                        }

                        $reportData[] = $reportItem;
                    }
                }

                $validated['data'] = json_encode($reportData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'statistic') {
                $statisticData = [
                    'total_programs' => $request->input('total_programs', 0),
                    'ongoing_programs' => $request->input('ongoing_programs', 0),
                    'completed_programs' => $request->input('completed_programs', 0),
                    'total_locations' => $request->input('total_locations', 0),
                    'total_budget' => $request->input('total_budget', 0),
                    'year' => $request->input('year', date('Y')),
                ];

                $validated['data'] = json_encode($statisticData);
                $validated['content'] = null;
            }
            
            else {
                // Untuk info/text
                $validated['data'] = null;
            }

            // Update record
            $psuContent->update($validated);

            Log::info('Updated PSU Record:', $psuContent->fresh()->toArray());

            return redirect()
                ->route('pages.psu-contents.index')
                ->with('success', 'Konten PSU berhasil diupdate!');

        } catch (\Exception $e) {
            Log::error('PSU Update Error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(PsuContent $psuContent)
    {
        try {
            // Hapus files yang terkait jika ada
            if ($psuContent->data) {
                $data = json_decode($psuContent->data, true);
                
                // Hapus images untuk program
                if ($psuContent->content_type === 'program' && isset($data['images'])) {
                    foreach ($data['images'] as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }
                
                // Hapus files untuk report
                if ($psuContent->content_type === 'report' && is_array($data)) {
                    foreach ($data as $report) {
                        if (isset($report['file'])) {
                            Storage::disk('public')->delete($report['file']);
                        }
                    }
                }
                
                // Hapus images untuk gallery
                if ($psuContent->content_type === 'gallery' && is_array($data)) {
                    foreach ($data as $gallery) {
                        if (isset($gallery['image'])) {
                            Storage::disk('public')->delete($gallery['image']);
                        }
                    }
                }
            }
            
            $psuContent->delete();

            return response()->json([
                'success' => true,
                'message' => 'Konten PSU berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            Log::error('PSU Delete Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus konten: ' . $e->getMessage()
            ], 500);
        }
    }
}