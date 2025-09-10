<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Dotenv\Exception\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class PejabatController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.struktural.index');
    }

    public function dataTable()
    {
        $builder = Pejabat::orderBy('id', 'asc');
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
            ->rawColumns(['foto'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.struktural.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'jabatan' => 'required',
                    'foto' => 'required|mimes:png,jpg,jpeg',
                ],
                [
                    'foto.required' => 'Foto Wajib Diunggah.',
                    'foto.mimes' => 'Format foto harus PNG, JPG. atau JEPG',
                ]
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $Struktural = $foto->store('struktural', 'public');
            }

            Pejabat::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $Struktural,
            ]);

            return redirect()->route('pages.struktural.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function edit($id)
    {
        $pejabatEdit = Pejabat::findOrFail($id);
        return view('pages.struktural.edit', compact('pejabatEdit'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        $pejabat = Pejabat::findOrFail($id);
        $FotoPejabat = $pejabat->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $FotoPejabat = $foto->store('struktural', 'public');
        }
        $pejabat->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $FotoPejabat,
        ]);
        return redirect()->route('pages.struktural.index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        try {
            $pejabat = Pejabat::find($id);
            $pejabat->delete();
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
