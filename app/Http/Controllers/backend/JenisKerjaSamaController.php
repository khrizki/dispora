<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisKerjaSamaRequest;
use App\Http\Services\Backend\JenisKerjaSamaService;
use App\Models\JenisKerjaSama;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;

class JenisKerjaSamaController extends Controller
{
    public function __construct(
        private JenisKerjaSamaService $jenisKerjaSamaService,
    ) {
        // Kamu bisa aktifkan middleware di sini jika dibutuhkan
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return app(\App\Http\Services\backend\JenisKerjaSamaService::class)->dataTable($request);
        }

        return view('pages.backend.jenis-kerja-sama.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.backend.jenis-kerja-sama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisKerjaSamaRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            $this->jenisKerjaSamaService->create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Jenis Kerja Sama berhasil ditambahkan!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ], 422);
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
        $jenisKerjaSama = JenisKerjaSama::findOrFail($id);

        return view('pages.backend.jenis-kerja-sama.show', compact('jenisKerjaSama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $jenisKerjaSama = JenisKerjaSama::findOrFail($id);

        return view('pages.backend.jenis-kerja-sama.edit', compact('jenisKerjaSama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisKerjaSamaRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();

        try {
            $this->jenisKerjaSamaService->update($data, $id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Jenis Kerja Sama berhasil diperbarui!'
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
            $this->jenisKerjaSamaService->delete($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Jenis Kerja Sama berhasil dihapus!'
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data: ' . $error->getMessage()
            ], 500);
        }
    }

    /**
     * For DataTables server-side processing (opsional).
     */
    public function serverside(Request $request): JsonResponse
    {
        return $this->jenisKerjaSamaService->dataTable($request);
    }
}
