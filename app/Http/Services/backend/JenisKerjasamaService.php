<?php

namespace App\Http\Services\Backend;

use App\Models\JenisKerjaSama;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JenisKerjaSamaService
{
    /**
     * DataTable untuk Jenis Kerja Sama
     */
     public function dataTable($request)
    {
        $query = JenisKerjaSama::select(['id', 'nama_jenis', 'deskripsi', 'status', 'created_at']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                return $row->status === 'aktif'
                    ? '<span class="badge badge-light-success">Aktif</span>'
                    : '<span class="badge badge-light-danger">Nonaktif</span>';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.jenis-kerja-sama.edit', $row->id);
                $deleteUrl = route('admin.jenis-kerja-sama.destroy', $row->id);
                return '
                    <div class="text-center">
                        <div class="btn-group">
                            <a href="' . $editUrl . '" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteData(this)" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Ambil satu data berdasarkan kolom
     */
    public function getFirstBy(string $column, string $value)
    {
        return JenisKerjaSama::where($column, $value)->firstOrFail();
    }

    /**
     * Ambil semua data Jenis Kerja Sama
     */
    public function all()
    {
        return JenisKerjaSama::latest('created_at')->get([
            'id',
            'nama_jenis',
            'deskripsi',
            'status',
        ]);
    }

    /**
     * Simpan data baru Jenis Kerja Sama
     */
    public function create(array $data)
    {
        // UUID di-generate otomatis oleh model
        return JenisKerjaSama::create($data);
    }

    /**
     * Update data Jenis Kerja Sama berdasarkan UUID
     */
    public function update(array $data, string $id)
    {
        $jenis = JenisKerjaSama::findOrFail($id);
        $jenis->update($data);
        return $jenis;
    }

    /**
     * Hapus data Jenis Kerja Sama
     */
    public function delete(string $id)
    {
        $jenis = JenisKerjaSama::findOrFail($id);
        $jenis->delete();
        return $jenis;
    }
}
