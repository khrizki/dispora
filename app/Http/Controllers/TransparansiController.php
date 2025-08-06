<?php

namespace App\Http\Controllers;

use App\Models\Transparansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;

class TransparansiController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.transparansi.index');
    }

    public function dataTable()
    {
        $builder = Transparansi::query();
        return DataTables::of($builder)
            ->addIndexColumn()
            ->editColumn('tahun', function ($row) {
                return Carbon::parse($row->tahun)->format('Y');
            })
            ->addColumn('file', function ($row) {
                if ($row->file) {
                    $url = asset('storage/' . $row->file);
                    return '<a href="' . $url . '" target="_blank" class="btn btn-sm btn-primary">Lihat File</a>';
                } else {
                    return '<span class="text-muted">Tidak ada file</span>';
                }
            })
            ->rawColumns(['file'])
            ->make(true);
    }
    public function create()
    {
        return view('pages.transparansi.create');
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul' => 'required',
                    'file' => 'required|mimes:pdf,word',
                    'tahun' => 'required',

                ],
                [
                    'file.required' => 'File wajib diunggah.',
                    'file.mimes' => 'Format file harus PDF, atau WORD',
                ]
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileTransparansi = $file->store('dokumen/transparansi', 'public');
            }

            $transparansi = Transparansi::create([
                'judul' => $request->judul,
                'tahun' => $request->tahun,
                'file' => $fileTransparansi,
            ]);

            return redirect()->route('pages.transparansi.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
