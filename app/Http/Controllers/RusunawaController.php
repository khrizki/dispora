<?php

namespace App\Http\Controllers;

use App\Models\Rusunawa;
use App\Models\RusunawaDetail;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RusunawaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->dataTable($request);
        }

        $areas = Area::all();
        return view('pages.rusunawa.index', compact('areas'));
    }

    public function dataTable(Request $request)
    {
        $query = Rusunawa::with('area')->orderBy('id', 'desc');

        if ($request->has('area_id') && $request->area_id) {
            $query->where('area_id', $request->area_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('area', function ($row) {
                return $row->area ? $row->area->nama : '-';
            })
            ->addColumn('gambar', function ($row) {
                if ($row->gambar) {
                    $url = asset('storage/' . $row->gambar);
                    return '<img src="' . $url . '" alt="Gambar Rusunawa" width="100" height="auto">';
                } else {
                    return '<span class="text-muted">Tidak ada gambar</span>';
                }
            })
            ->addColumn('has_detail', function ($row) {
                if ($row->detail) {
                    return '<span class="badge badge-success">Ada Detail</span>';
                } else {
                    return '<span class="badge badge-secondary">Belum Ada Detail</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="'.route('pages.rusunawa.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>';
                
                // Tombol Detail
                if ($row->detail) {
                    $btn .= ' <a href="'.route('pages.rusunawa.detail.edit', $row->id).'" class="btn btn-info btn-sm">Edit Detail</a>';
                } else {
                    $btn .= ' <a href="'.route('pages.rusunawa.detail.create', $row->id).'" class="btn btn-primary btn-sm">Tambah Detail</a>';
                }
                
                $btn .= ' <form action="'.route('pages.rusunawa.destroy', $row->id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>';
                return $btn;
            })
            ->rawColumns(['gambar', 'has_detail', 'action'])
            ->make(true);
    }

    public function create()
    {
        $areas = Area::all();
        return view('pages.rusunawa.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'jumlah_tower' => 'nullable|integer',
            'jumlah_blok' => 'nullable|integer',
            'total_unit' => 'nullable|integer',
            'tipe_unit' => 'nullable|string|max:255',
            'jumlah_unit_kosong' => 'nullable|integer',
            'pengelola' => 'nullable|string|max:255',
            'nomor_hotline' => 'nullable|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('rusunawa', 'public');
        }

        Rusunawa::create([
            'nama' => $request->nama,
            'area_id' => $request->area_id,
            'jumlah_tower' => $request->jumlah_tower,
            'jumlah_blok' => $request->jumlah_blok,
            'total_unit' => $request->total_unit,
            'tipe_unit' => $request->tipe_unit,
            'jumlah_unit_kosong' => $request->jumlah_unit_kosong,
            'pengelola' => $request->pengelola,
            'nomor_hotline' => $request->nomor_hotline,
            'gambar' => $path,
        ]);

        return redirect()->route('pages.rusunawa.index')
                        ->with('success', 'Data Rusunawa berhasil ditambahkan.');
    }

    public function edit(Rusunawa $rusunawa)
    {
        $areas = Area::all();
        return view('pages.rusunawa.edit', compact('rusunawa', 'areas'));
    }

    public function update(Request $request, Rusunawa $rusunawa)
    {
        $data = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'nama' => 'required|string|max:255',
            'jumlah_tower' => 'nullable|integer',
            'jumlah_blok' => 'nullable|integer',
            'total_unit' => 'nullable|integer',
            'tipe_unit' => 'nullable|string',
            'jumlah_unit_kosong' => 'nullable|integer',
            'pengelola' => 'nullable|string',
            'nomor_hotline' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $rusunawa->gambar;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('rusunawa', 'public');
        }

        $data['gambar'] = $path;
        $rusunawa->update($data);

        return redirect()->route('pages.rusunawa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function show(Request $request)
    {
        $areas = Area::all();

        $query = Rusunawa::with('area');

        if ($request->filled('area_id')) {
            $query->where('area_id', $request->area_id);
        }

        $rusunawa = $query->get();

        return view('profil.rusunawa', compact('rusunawa', 'areas'));
    }

    public function destroy(Rusunawa $rusunawa)
    {
        if ($rusunawa->gambar && Storage::disk('public')->exists($rusunawa->gambar)) {
            Storage::disk('public')->delete($rusunawa->gambar);
        }

        $rusunawa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ]);
    }

    // ==========================================
    // DETAIL RUSUNAWA METHODS
    // ==========================================

    /**
     * Show form untuk create detail rusunawa
     */
    public function createDetail($rusunawa_id)
    {
        $rusunawa = Rusunawa::findOrFail($rusunawa_id);
        
        // Cek apakah sudah ada detail
        if ($rusunawa->detail) {
            return redirect()->route('pages.rusunawa.detail.edit', $rusunawa_id)
                           ->with('info', 'Detail sudah ada, silakan edit.');
        }

        return view('pages.rusunawa.detail-create', compact('rusunawa'));
    }

    /**
     * Store detail rusunawa
     */
    public function storeDetail(Request $request, $rusunawa_id)
    {
        $rusunawa = Rusunawa::findOrFail($rusunawa_id);

        $request->validate([
            'kode' => 'nullable|string|max:50',
            'uprs' => 'nullable|string|max:100',
            'kepala_uprs' => 'nullable|string|max:255',
            'luas_area_m2' => 'nullable|numeric',
            'nomor_imb' => 'nullable|string|max:100',
            'nomor_slf' => 'nullable|string|max:100',
            'dana_pembangunan' => 'nullable|numeric',
            'status_serah_terima' => 'nullable|in:Belum,Sudah',
            'tahun_pembuatan' => 'nullable|string|max:50',
            'tarif_unit_terprogram' => 'nullable|numeric',
            'tarif_unit_umum' => 'nullable|numeric',
            'batas_maksimum_gaji' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'embed_gmaps_url' => 'nullable|string',
            'fasilitas' => 'nullable|array',
            'fasilitas.*.nama' => 'required_with:fasilitas|string',
            'fasilitas.*.jumlah' => 'nullable|integer',
            'galeri_foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Handle galeri foto
            $galeriData = [];
            if ($request->hasFile('galeri_foto')) {
                foreach ($request->file('galeri_foto') as $index => $file) {
                    $path = $file->store('rusunawa/detail', 'public');
                    $galeriData[] = [
                        'path' => $path,
                        'caption' => $request->input("galeri_caption.$index", ''),
                    ];
                }
            }

            RusunawaDetail::create([
                'rusunawa_id' => $rusunawa_id,
                'kode' => $request->kode,
                'uprs' => $request->uprs,
                'kepala_uprs' => $request->kepala_uprs,
                'luas_area_m2' => $request->luas_area_m2,
                'nomor_imb' => $request->nomor_imb,
                'nomor_slf' => $request->nomor_slf,
                'dana_pembangunan' => $request->dana_pembangunan,
                'status_serah_terima' => $request->status_serah_terima,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'tarif_unit_terprogram' => $request->tarif_unit_terprogram,
                'tarif_unit_umum' => $request->tarif_unit_umum,
                'batas_maksimum_gaji' => $request->batas_maksimum_gaji,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'embed_gmaps_url' => $request->embed_gmaps_url,
                'fasilitas' => $request->fasilitas,
                'galeri_foto' => $galeriData,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();

            return redirect()->route('pages.rusunawa.index')
                           ->with('success', 'Detail Rusunawa berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show form edit detail rusunawa
     */
    public function editDetail($rusunawa_id)
    {
        $rusunawa = Rusunawa::with('detail')->findOrFail($rusunawa_id);
        
        if (!$rusunawa->detail) {
            return redirect()->route('pages.rusunawa.detail.create', $rusunawa_id)
                           ->with('info', 'Detail belum ada, silakan tambahkan.');
        }

        $detail = $rusunawa->detail;

        return view('pages.rusunawa.detail-edit', compact('rusunawa', 'detail'));
    }

    /**
     * Update detail rusunawa
     */
    public function updateDetail(Request $request, $rusunawa_id)
    {
        $rusunawa = Rusunawa::with('detail')->findOrFail($rusunawa_id);
        $detail = $rusunawa->detail;

        if (!$detail) {
            return redirect()->route('pages.rusunawa.detail.create', $rusunawa_id)
                           ->with('error', 'Detail tidak ditemukan.');
        }

        $request->validate([
            'kode' => 'nullable|string|max:50',
            'uprs' => 'nullable|string|max:100',
            'kepala_uprs' => 'nullable|string|max:255',
            'luas_area_m2' => 'nullable|numeric',
            'nomor_imb' => 'nullable|string|max:100',
            'nomor_slf' => 'nullable|string|max:100',
            'dana_pembangunan' => 'nullable|numeric',
            'status_serah_terima' => 'nullable|in:Belum,Sudah',
            'tahun_pembuatan' => 'nullable|string|max:50',
            'tarif_unit_terprogram' => 'nullable|numeric',
            'tarif_unit_umum' => 'nullable|numeric',
            'batas_maksimum_gaji' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'embed_gmaps_url' => 'nullable|string',
            'fasilitas' => 'nullable|array',
            'fasilitas.*.nama' => 'required_with:fasilitas|string',
            'fasilitas.*.jumlah' => 'nullable|integer',
            'galeri_foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hapus_foto' => 'nullable|array',
            'deskripsi' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Handle galeri foto existing
            $galeriData = $detail->galeri_foto ?? [];

            // Hapus foto yang dipilih
            if ($request->filled('hapus_foto')) {
                foreach ($request->hapus_foto as $index) {
                    if (isset($galeriData[$index])) {
                        $path = $galeriData[$index]['path'];
                        if (Storage::disk('public')->exists($path)) {
                            Storage::disk('public')->delete($path);
                        }
                        unset($galeriData[$index]);
                    }
                }
                $galeriData = array_values($galeriData); // Re-index array
            }

            // Upload foto baru
            if ($request->hasFile('galeri_foto')) {
                foreach ($request->file('galeri_foto') as $index => $file) {
                    $path = $file->store('rusunawa/detail', 'public');
                    $galeriData[] = [
                        'path' => $path,
                        'caption' => $request->input("galeri_caption.$index", ''),
                    ];
                }
            }

            $detail->update([
                'kode' => $request->kode,
                'uprs' => $request->uprs,
                'kepala_uprs' => $request->kepala_uprs,
                'luas_area_m2' => $request->luas_area_m2,
                'nomor_imb' => $request->nomor_imb,
                'nomor_slf' => $request->nomor_slf,
                'dana_pembangunan' => $request->dana_pembangunan,
                'status_serah_terima' => $request->status_serah_terima,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'tarif_unit_terprogram' => $request->tarif_unit_terprogram,
                'tarif_unit_umum' => $request->tarif_unit_umum,
                'batas_maksimum_gaji' => $request->batas_maksimum_gaji,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'embed_gmaps_url' => $request->embed_gmaps_url,
                'fasilitas' => $request->fasilitas,
                'galeri_foto' => $galeriData,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();

            return redirect()->route('pages.rusunawa.index')
                           ->with('success', 'Detail Rusunawa berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show detail rusunawa di frontend
     */
    public function showDetail($rusunawa_id)
    {
        $rusunawa = Rusunawa::with(['detail', 'area'])->findOrFail($rusunawa_id);

        if (!$rusunawa->detail) {
            abort(404, 'Detail rusunawa tidak ditemukan.');
        }

        return view('profil.rusunawa-detail', compact('rusunawa'));
    }
}