<?php

namespace App\Http\Controllers;

use App\Models\Rusunawa;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class RusunawaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->dataTable($request);
        }

        $areas = Area::all();
        return view('pages.rusunawa.index', compact('areas'));
    }

    public function dataTable(Request $request)
    {
        $query = Rusunawa::with('area')->orderBy('id', 'desc');

        if ($request->has('area_id') && $request->area_id) {
            $query->where('area_id', $request->area_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('area', function ($row) {
                return $row->area ? $row->area->nama : '-';
            })
            ->addColumn('gambar', function ($row) {
                if ($row->gambar) {
                    $url = asset('storage/' . $row->gambar);
                    return '<img src="' . $url . '" alt="Gambar Rusunawa" width="100" height="auto">';
                } else {
                    return '<span class="text-muted">Tidak ada gambar</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="'.route('pages.rusunawa.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= ' <form action="'.route('pages.rusunawa.destroy', $row->id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>';
                return $btn;
            })
            ->rawColumns(['gambar', 'action'])
            ->make(true);
    }

    public function create()
    {
        $areas = Area::all();
        return view('pages.rusunawa.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'jumlah_tower' => 'nullable|integer',
            'jumlah_blok' => 'nullable|integer',
            'total_unit' => 'nullable|integer',
            'tipe_unit' => 'nullable|string|max:255',
            'jumlah_unit_kosong' => 'nullable|integer',
            'pengelola' => 'nullable|string|max:255',
            'nomor_hotline' => 'nullable|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('rusunawa', 'public');
        }

        Rusunawa::create([
            'nama' => $request->nama,
            'area_id' => $request->area_id,
            'jumlah_tower' => $request->jumlah_tower,
            'jumlah_blok' => $request->jumlah_blok,
            'total_unit' => $request->total_unit,
            'tipe_unit' => $request->tipe_unit,
            'jumlah_unit_kosong' => $request->jumlah_unit_kosong,
            'pengelola' => $request->pengelola,
            'nomor_hotline' => $request->nomor_hotline,
            'gambar' => $path,
        ]);

        return redirect()->route('pages.rusunawa.index')
                        ->with('success', 'Data Rusunawa berhasil ditambahkan.');
    }

    public function edit(Rusunawa $rusunawa)
    {
        $areas = Area::all();
        return view('pages.rusunawa.edit', compact('rusunawa', 'areas'));
    }

    public function update(Request $request, Rusunawa $rusunawa)
    {
        $data = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'nama' => 'required|string|max:255',
            'jumlah_tower' => 'nullable|integer',
            'jumlah_blok' => 'nullable|integer',
            'total_unit' => 'nullable|integer',
            'tipe_unit' => 'nullable|string',
            'jumlah_unit_kosong' => 'nullable|integer',
            'pengelola' => 'nullable|string',
            'nomor_hotline' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $rusunawa->gambar;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('rusunawa', 'public');
        }

        $data['gambar'] = $path;
        $rusunawa->update($data);

        return redirect()->route('pages.rusunawa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function show(Request $request)
    {
        $areas = Area::all();

        $query = Rusunawa::with('area');

        if ($request->filled('area_id')) {
            $query->where('area_id', $request->area_id);
        }

        $rusunawa = $query->get();

        return view('profil.rusunawa', compact('rusunawa', 'areas'));
    }



    public function destroy(Rusunawa $rusunawa)
    {
        if ($rusunawa->gambar && Storage::disk('public')->exists($rusunawa->gambar)) {
            Storage::disk('public')->delete($rusunawa->gambar);
        }

        $rusunawa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ]);
    }
}
