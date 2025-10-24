<?php

namespace App\Http\Services\backend;

use App\Models\Kerjasama;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class KerjasamaService
{
    /**
     * DataTable untuk kerjasama
     */
    public function dataTable($request)
    {
        $query = Kerjasama::latest()->select([
            'id',
            'nama_mitra',
            'slug',
            'jenis_kerjasama',
            'tanggal_mulai',
            'tanggal_selesai'
        ]);

        // ✅ Filter pencarian
        if (!empty($request->search['value'])) {
            $search = $request->search['value'];
            $query->where(function ($q) use ($search) {
                $q->where('nama_mitra', 'like', "%{$search}%")
                    ->orWhere('jenis_kerjasama', 'like', "%{$search}%");
            });
        }

        // ✅ Gunakan DataTables langsung
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('tanggal_mulai', fn($row) => date('d M Y', strtotime($row->tanggal_mulai)))
            ->editColumn('tanggal_selesai', fn($row) => date('d M Y', strtotime($row->tanggal_selesai)))
            ->addColumn('action', function ($row) {
                return '
                    <div class="text-center">
                        <div class="btn-group">
                            <a href="' . route('admin.kerja-sama.show', $row->id) . '" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="' . route('admin.kerja-sama.edit', $row->id) . '" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteData(this)" data-id="' . $row->id . '">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Ambil satu data berdasarkan kolom
     */
    public function getFirstBy(string $column, string $value)
    {
        return Kerjasama::where($column, $value)->firstOrFail();
    }

    /**
     * Ambil semua data kerjasama
     */
    public function all()
    {
        return Kerjasama::latest('tanggal_mulai')->get([
            'id',
            'slug',
            'nama_mitra',
            'jenis_kerjasama',
            'tanggal_mulai',
            'tanggal_selesai'
        ]);
    }

    /**
     * Simpan data baru kerjasama
     */
    public function create(array $data)
    {
        $data['slug'] = Str::slug($data['nama_mitra']);
        return Kerjasama::create($data);
    }

    /**
     * Update data kerjasama berdasarkan UUID
     */
    public function update(array $data, string $slug)
    {
        $kerjasama = Kerjasama::where('slug', $slug)->firstOrFail();
        $kerjasama->update($data);
        return $kerjasama;
    }

    /**
     * Hapus data (soft delete opsional)
     */
    public function delete(string $slug)
    {
        $kerjasama = Kerjasama::where('slug', $slug)->firstOrFail();
        $kerjasama->delete();
        return $kerjasama;
    }
}
