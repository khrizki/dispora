<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.galeri.index');
    }

    public function dataTable()
    {
        $builder = Galeri::query();
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('foto_galery', function ($row) {
                if ($row->foto_galery) {
                    $url = asset('storage/' . $row->foto_galery);
                    return '<img src="' . $url . '" alt="Foto Galeri" width="100" height="auto">';
                } else {
                    return '<span class="text-muted">Tidak ada foto</span>';
                }
            })
            ->rawColumns(['foto_galery'])
            ->make(true);
    }
    public function create()
    {
        return view('pages.galeri.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul_galery' => 'required',
                    'foto_galery' => 'required|mimes:png,jpg,jpeg',
                ],
                [
                    'foto_galery.required' => 'Foto wajib diunggah.',
                    'foto.mimes' => 'Format foto harus PNG, JPG, atua JEPG',
                ]
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }
            if ($request->hasFile('foto_galery')) {
                $foto_galery = $request->file('foto_galery');
                $fotoGalery = $foto_galery->store('galery', 'public');
            }

            Galeri::create([
                'judul_galery' => $request->judul_galery,
                'foto_galery' => $fotoGalery,
            ]);

            return redirect()->route('pages.galeri.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}