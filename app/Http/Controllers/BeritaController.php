<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BeritaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.berita.index');
    }

    public function dataTable()
    {
        $builder = Berita::orderBy('created_at', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('foto', function ($row) {
                if ($row->foto) {
                    $url = asset('storage/' . $row->foto);
                    return '<img src="' . $url . '" alt="Foto Galeri" width="100" height="auto">';
                } else {
                    return '<span class="text-muted">Tidak ada foto</span>';
                }
            })
            ->addColumn('isi_berita', function ($row) {
                return Str::limit(strip_tags($row->isi_berita), 100);
            })
            ->rawColumns(['foto'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita'     => 'required|string|max:255',
            'tanggal_berita'   => 'required|date',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi_berita'       => 'required|string',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('berita_thumbnails', 'public');
        }

        Berita::create([
            'judul_berita'   => $request->judul_berita,
            'tanggal_berita' => $request->tanggal_berita,
            'foto'           => $path,
            'isi_berita'     => $request->isi_berita,
        ]);

        return redirect()->route('pages.berita.index')->with('success', 'Data berita berhasil disimpan.');
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('berita_images', 'public');
            return asset('storage/' . $path);
        }

        return response()->json(['error' => 'Gagal upload'], 400);
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita.edit', compact('berita'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_berita' => 'required|max:255',
            'tanggal_berita' => 'required|date',
            'isi_berita' => 'required|string',
        ]);
        $berita = Berita::findOrFail($id);
        $path = $berita->foto;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('berita_thumbnails', 'public');
        }
        $berita->update([
            'judul_berita' => $request->judul_berita,
            'tanggal_berita' => $request->tanggal_berita,
            'foto' => $path,
            'isi_berita' => $request->isi_berita,
        ]);
        return redirect()->route('pages.berita.index')->with('success', 'Data Berhasil diupdate');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita.show', compact('berita'));
    }

    public function destroy($id)
    {
        try {
            $berita = Berita::find($id);
            $berita->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
