<?php

namespace App\Http\Controllers;

use App\Models\RtlhContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class RtlhContentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = RtlhContent::orderBy('order', 'asc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $badge = $row->is_active 
                        ? '<span class="badge bg-success">Aktif</span>' 
                        : '<span class="badge bg-secondary">Nonaktif</span>';
                    return $badge;
                })
                ->addColumn('type_badge', function ($row) {
                    $colors = [
                        'text' => 'primary',
                        'gallery' => 'info',
                        'download' => 'warning',
                        'faq' => 'success'
                    ];
                    $color = $colors[$row->content_type] ?? 'secondary';
                    return '<span class="badge bg-'.$color.'">'.ucfirst($row->content_type).'</span>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl   = route('pages.rtlh-contents.edit', $row->id);
                    $deleteUrl = route('pages.rtlh-contents.destroy', $row->id);

                    return '
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="delete-form">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['status', 'type_badge', 'action'])
                ->make(true);
        }

        return view('pages.rtlh-contents.index');
    }

    public function create()
    {
        return view('pages.rtlh-contents.create');
    }

    public function store(Request $request)
    {
        try {
            // Log request untuk debug
            Log::info('Store Request:', $request->all());
            Log::info('Files:', $request->allFiles());

            // Validasi dasar
            $validated = $request->validate([
                'section_key' => 'required|string|max:255',
                'section_title' => 'required|string|max:255',
                'content_type' => 'required|in:text,gallery,download,faq',
                'order' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            // Set default values
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            $validated['order'] = $request->order ?? 0;
            $validated['data'] = null;

            // Handle berdasarkan tipe konten
            if ($request->content_type === 'gallery') {
                $galleryData = [];

                if ($request->has('gallery')) {
                    foreach ($request->gallery as $index => $item) {
                        // Skip jika semua field kosong
                        if (empty($item['nama']) && empty($item['lokasi'])) {
                            continue;
                        }

                        $galleryItem = [
                            'nama' => $item['nama'] ?? '',
                            'lokasi' => $item['lokasi'] ?? '',
                            'tahun' => $item['tahun'] ?? '',
                            'testimoni' => $item['testimoni'] ?? '',
                            'foto_sebelum' => '',
                            'foto_sesudah' => ''
                        ];

                        // Upload foto_sebelum
                        if ($request->hasFile("gallery.{$index}.foto_sebelum")) {
                            $file = $request->file("gallery.{$index}.foto_sebelum");
                            $galleryItem['foto_sebelum'] = $file->store('rtlh/gallery', 'public');
                        }

                        // Upload foto_sesudah
                        if ($request->hasFile("gallery.{$index}.foto_sesudah")) {
                            $file = $request->file("gallery.{$index}.foto_sesudah");
                            $galleryItem['foto_sesudah'] = $file->store('rtlh/gallery', 'public');
                        }

                        $galleryData[] = $galleryItem;
                    }
                }

                $validated['data'] = json_encode($galleryData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'download') {
                $downloadData = [];

                if ($request->has('download')) {
                    foreach ($request->download as $index => $item) {
                        // Skip jika title kosong
                        if (empty($item['title'])) {
                            continue;
                        }

                        $downloadItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'file' => ''
                        ];

                        // Upload file
                        if ($request->hasFile("download.{$index}.file")) {
                            $file = $request->file("download.{$index}.file");
                            $downloadItem['file'] = $file->store('rtlh/downloads', 'public');
                        }

                        $downloadData[] = $downloadItem;
                    }
                }

                $validated['data'] = json_encode($downloadData);
                $validated['content'] = null;
            }
            
            else {
                // Untuk text dan faq
                $validated['data'] = null;
            }

            // Create record
            $rtlhContent = RtlhContent::create($validated);

            Log::info('Created Record:', $rtlhContent->toArray());

            return redirect()
                ->route('pages.rtlh-contents.index')
                ->with('success', 'Konten RTLH berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Store Error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function edit(RtlhContent $rtlhContent)
    {
        return view('pages.rtlh-contents.edit', compact('rtlhContent'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Log request untuk debug
            Log::info('Update Request:', $request->all());
            Log::info('Files:', $request->allFiles());

            // Validasi dasar
            $validated = $request->validate([
                'section_key' => 'required|string|max:255',
                'section_title' => 'required|string|max:255',
                'content_type' => 'required|in:text,gallery,download,faq',
                'order' => 'nullable|integer',
                'content' => 'nullable|string',
            ]);

            $rtlhContent = RtlhContent::findOrFail($id);

            // Set default values
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            $validated['order'] = $request->order ?? 0;

            // Handle berdasarkan tipe konten
            if ($request->content_type === 'gallery') {
                $galleryData = [];

                if ($request->has('gallery')) {
                    foreach ($request->gallery as $index => $item) {
                        // Skip jika semua field kosong
                        if (empty($item['nama']) && empty($item['lokasi'])) {
                            continue;
                        }

                        $galleryItem = [
                            'nama' => $item['nama'] ?? '',
                            'lokasi' => $item['lokasi'] ?? '',
                            'tahun' => $item['tahun'] ?? '',
                            'testimoni' => $item['testimoni'] ?? '',
                            'foto_sebelum' => '',
                            'foto_sesudah' => ''
                        ];

                        // Handle foto_sebelum
                        if ($request->hasFile("gallery.{$index}.foto_sebelum")) {
                            // Hapus foto lama jika ada
                            if (!empty($item['foto_sebelum_old'])) {
                                Storage::disk('public')->delete($item['foto_sebelum_old']);
                            }
                            
                            $file = $request->file("gallery.{$index}.foto_sebelum");
                            $galleryItem['foto_sebelum'] = $file->store('rtlh/gallery', 'public');
                        } else {
                            // Gunakan foto lama
                            $galleryItem['foto_sebelum'] = $item['foto_sebelum_old'] ?? '';
                        }

                        // Handle foto_sesudah
                        if ($request->hasFile("gallery.{$index}.foto_sesudah")) {
                            // Hapus foto lama jika ada
                            if (!empty($item['foto_sesudah_old'])) {
                                Storage::disk('public')->delete($item['foto_sesudah_old']);
                            }
                            
                            $file = $request->file("gallery.{$index}.foto_sesudah");
                            $galleryItem['foto_sesudah'] = $file->store('rtlh/gallery', 'public');
                        } else {
                            // Gunakan foto lama
                            $galleryItem['foto_sesudah'] = $item['foto_sesudah_old'] ?? '';
                        }

                        $galleryData[] = $galleryItem;
                    }
                }

                $validated['data'] = json_encode($galleryData);
                $validated['content'] = null;
            }
            
            elseif ($request->content_type === 'download') {
                $downloadData = [];

                if ($request->has('download')) {
                    foreach ($request->download as $index => $item) {
                        // Skip jika title kosong
                        if (empty($item['title'])) {
                            continue;
                        }

                        $downloadItem = [
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'file' => ''
                        ];

                        // Handle file upload
                        if ($request->hasFile("download.{$index}.file")) {
                            // Hapus file lama jika ada
                            if (!empty($item['file_old'])) {
                                Storage::disk('public')->delete($item['file_old']);
                            }
                            
                            $file = $request->file("download.{$index}.file");
                            $downloadItem['file'] = $file->store('rtlh/downloads', 'public');
                        } else {
                            // Gunakan file lama
                            $downloadItem['file'] = $item['file_old'] ?? '';
                        }

                        $downloadData[] = $downloadItem;
                    }
                }

                $validated['data'] = json_encode($downloadData);
                $validated['content'] = null;
            }
            
            else {
                // Untuk text dan faq
                $validated['data'] = null;
            }

            // Update record
            $rtlhContent->update($validated);

            Log::info('Updated Record:', $rtlhContent->fresh()->toArray());

            return redirect()
                ->route('pages.rtlh-contents.index')
                ->with('success', 'Konten RTLH berhasil diupdate!');

        } catch (\Exception $e) {
            Log::error('Update Error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(RtlhContent $rtlhContent)
    {
        $rtlhContent->delete();

        return response()->json([
            'success' => true,
            'message' => 'Konten RTLH berhasil dihapus'
        ]);
    }
}