<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LowonganController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.lowongan.index');
    }

    public function dataTable()
    {
        $builder = Lowongan::orderBy('created_at', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->addColumn('deskripsi', function ($row) {
                return Str::limit(strip_tags($row->deskripsi), 100);
            })
            ->addColumn('status_badge', function ($row) {
                if ($row->status === 'aktif') {
                    return '<span class="badge bg-success">Aktif</span>';
                }
                return '<span class="badge bg-danger">Ditutup</span>';
            })
            ->rawColumns(['status_badge'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'posisi'    => 'nullable|string|max:255',
            'tipe'      => 'required|string|in:kontrak,magang',
            'lokasi'    => 'nullable|string|max:255',
            'status'    => 'required|string|in:aktif,ditutup',
            'deskripsi' => 'required|string',
        ]);

        Lowongan::create([
            'judul'     => $request->judul,
            'posisi'    => $request->posisi,
            'tipe'      => $request->tipe,
            'lokasi'    => $request->lokasi,
            'status'    => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('pages.lowongan.index')->with('success', 'Lowongan berhasil disimpan.');
    }

    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('pages.lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'posisi'    => 'nullable|string|max:255',
            'tipe'      => 'required|string|in:kontrak,magang',
            'lokasi'    => 'nullable|string|max:255',
            'status'    => 'required|string|in:aktif,ditutup',
            'deskripsi' => 'required|string',
        ]);
        
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update([
            'judul'     => $request->judul,
            'posisi'    => $request->posisi,
            'tipe'      => $request->tipe,
            'lokasi'    => $request->lokasi,
            'status'    => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('pages.lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $lowongan = Lowongan::find($id);
            $lowongan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Lowongan berhasil dihapus'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
