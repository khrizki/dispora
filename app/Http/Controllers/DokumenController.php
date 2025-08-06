<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.dokumen.index');
    }

    public function dataTable()
    {
        $builder = Dokumen::query();
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
        return view('pages.dokumen.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul' => 'required',
                    'file' => 'required|mimes:pdf,word',
                    'tanggal' => 'required',

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
                $fileDokumen = $file->store('dokumen/dokumen-anggaran', 'public');
            }

            Dokumen::create([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'file' => $fileDokumen,
            ]);

            return redirect()->route('pages.dokumen.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
