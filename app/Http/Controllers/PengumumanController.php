<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $builder = Pengumuman::query();
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('jam', function ($row) {
                return \Carbon\Carbon::parse($row->jam)->format('H:i'); // Menampilkan jam dan menit saja
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
            ]);
            return redirect()->route('pages.pengumuman.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
