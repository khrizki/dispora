<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisKerjaSamaRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan melakukan request ini.
     */
    public function authorize(): bool
    {
        // Kalau pakai auth, bisa ganti sesuai kebutuhan, misal:
        // return auth()->check();
        return true;
    }

    /**
     * Aturan validasi input.
     */
    public function rules(): array
    {
        return [
            'nama_jenis' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ];
    }

    /**
     * Pesan error kustom untuk validasi.
     */
    public function messages(): array
    {
        return [
            'nama_jenis.required' => 'Nama jenis kerja sama wajib diisi.',
            'nama_jenis.string' => 'Nama jenis kerja sama harus berupa teks.',
            'nama_jenis.max' => 'Nama jenis kerja sama maksimal 100 karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh bernilai aktif atau nonaktif.',
        ];
    }
}
