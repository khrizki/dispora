<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.pengumuman.index');
    }

    public function dataTable()
    {
        $builder = Pengumuman::orderBy('id', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('jam', function ($row) {
                return \Carbon\Carbon::parse($row->jam)->format('H:i'); // Menampilkan jam dan menit saja
            })
            ->addColumn('jam_selesai', function ($row) {
                return \Carbon\Carbon::parse($row->jam_selesai)->format('H:i'); // Menampilkan jam dan menit saja
            })
            ->make(true);
    }

    public function create()
    {
        return view('pages.pengumuman.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul_pengumuman' => 'required',
                    'isi_pengumuman' => 'required',
                    'tanggal' => 'required',
                    'jam' => 'required',
                    'jam_selesai' => 'required',
                ],
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }

            Pengumuman::create([
                'judul_pengumuman' => $request->judul_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'jam_selesai' => $request->jam_selesai,
            ]);
            return redirect()->route('pages.pengumuman.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $pengumumanEdit = Pengumuman::findOrFail($id);
        // dd($pengumuman);
        $oke = 'oke';
        return view('pages.pengumuman.edit', compact('pengumumanEdit', 'oke'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'jam_selesai' => 'required',
        ]);
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update([
            'judul_pengumuman' => $request->judul_pengumuman,
            'isi_pengumuman' => $request->isi_pengumuman,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'jam_selesai' => $request->jam_selesai,
        ]);
        return redirect()->route('pages.pengumuman.index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        try {
            $pengumuman = Pengumuman::find($id);
            $pengumuman->delete();
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

   public function show()
{
    $query = Pengumuman::query();

    if (request('judul')) {
        $query->where('judul_pengumuman', 'like', '%' . request('judul') . '%');
    }

    if (request('tanggal')) {
        $query->whereDate('tanggal', request('tanggal'));
    }

    $pengumuman = $query->orderBy('tanggal', 'desc')->paginate(10);

    return view('profil.pengumuman', compact('pengumuman'));
}

}
