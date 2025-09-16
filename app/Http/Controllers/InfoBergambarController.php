<?php

namespace App\Http\Controllers;

use App\Models\Infobergambar;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class InfoBergambarController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }

        return view('pages.info-bergambar.index');
    }
    public function dataTable()
    {
        $builder = Infobergambar::orderBy('id', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('gambar', function ($row) {
                if ($row->gambar) {
                    $url = asset('storage/' . $row->gambar);
                    return '<img src="' . $url . '" alt="Foto Galeri" width="100" height="auto">';
                } else {
                    return '<span class="text-muted">Tidak ada foto</span>';
                }
            })
            ->rawColumns(['gambar'])
            ->make(true);
    }
    public function create()
    {
        return view('pages.info-bergambar.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul_gambar' => 'required',
                    'gambar' => 'required|mimes:png,jpg,jpeg',
                ],
                [
                    'gambar.required' => 'Foto Wajib Diunggah.',
                    'foto.mimes' => 'Format foto harus PNG, JPG. atau JEPG',
                ]
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $InfoGambar = $gambar->store('info-bergambar', 'public');
            }

            Infobergambar::create([
                'judul_gambar' => $request->judul_gambar,
                'gambar' => $InfoGambar,
            ]);

            return redirect()->route('pages.info.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function edit($id)
    {
        $InfoEdit = Infobergambar::findOrFail($id);
        return view('pages.info-bergambar.edit', compact('InfoEdit'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_gambar' => 'required',
            'gambar' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        $info_bergambar = Infobergambar::findOrFail($id);
        $FotoBergambar = $info_bergambar->gambar;
        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $FotoBergambar = $foto->store('info-bergambar', 'public');
        }
        $info_bergambar->update([
            'judul_gambar' => $request->judul_gambar,
            'gambar' => $FotoBergambar,
        ]);
        return redirect()->route('pages.info.index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        try {
            $info = Infobergambar::find($id);
            $info->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Struktural Berhasil di Hapus'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
