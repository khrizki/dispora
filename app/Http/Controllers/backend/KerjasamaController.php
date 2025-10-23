<?php

namespace App\Http\Controllers\backend;

use App\Models\Kerjasama;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\KerjasamaRequest;
use App\Http\Services\backend\KerjasamaService;

class KerjasamaController extends Controller
{
    public function __construct(
        private KerjasamaService $kerjasamaService,
    ) {
        // Middleware bisa disesuaikan misal: $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // ✅ Bisa deteksi semua jenis AJAX DataTables
        if ($request->ajax() || $request->wantsJson() || $request->has('draw')) {
            return $this->kerjasamaService->dataTable($request);
        }

        return view('backend.kerja-sama.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.kerja-sama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KerjasamaRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            $this->kerjasamaService->create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Kerja Sama Berhasil Ditambahkan!'
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan data: ' . $error->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $kerjasama = Kerjasama::findOrFail($id);

        return view('backend.kerja-sama.show', [
            'kerjasama' => $kerjasama
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $kerjasama = Kerjasama::findOrFail($id);

        return view('backend.kerja-sama.edit', [
            'kerjasama' => $kerjasama
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KerjasamaRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();

        try {
            $this->kerjasamaService->update($data, $id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Kerja Sama Berhasil Diperbarui!'
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui data: ' . $error->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->kerjasamaService->delete($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Kerja Sama Berhasil Dihapus!'
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data: ' . $error->getMessage()
            ], 500);
        }
    }

    /**
     * Restore soft deleted record.
     */
    // public function restore(string $id): JsonResponse
    // {
    //     try {
    //         $this->kerjasamaService->restore($id);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data Kerja Sama Berhasil Dipulihkan!'
    //         ]);
    //     } catch (\Exception $error) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Gagal memulihkan data: ' . $error->getMessage()
    //         ], 500);
    //     }
    // }

    // /**
    //  * Force delete a record permanently.
    //  */
    // public function forceDelete(string $id): JsonResponse
    // {
    //     try {
    //         $this->kerjasamaService->forceDelete($id);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data Kerja Sama Berhasil Dihapus Permanen!'
    //         ]);
    //     } catch (\Exception $error) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Gagal menghapus permanen: ' . $error->getMessage()
    //         ], 500);
    //     }
    // }

    /**
     * For DataTables server-side processing.
     */
    public function serverside(Request $request): JsonResponse
    {
        return $this->kerjasamaService->dataTable($request);
    }
}
