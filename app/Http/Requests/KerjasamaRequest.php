<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KerjasamaRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan melakukan request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validasi untuk create & update.
     */
    public function rules(): array
    {
        // Kalau edit (ada ID di route), maka kita bisa tambahkan logika berbeda
        $isUpdate = $this->route('kerja-sama') ? true : false;

        return [
            'nama_mitra'       => ['required', 'string', 'max:255'],
            'jenis_kerjasama'  => ['required', 'string', 'max:255'],
            'tanggal_mulai'    => ['required', 'date'],
            'tanggal_selesai'  => ['required', 'date', 'after_or_equal:tanggal_mulai'],
        ];
    }

    /**
     * Pesan validasi kustom.
     */
    public function messages(): array
    {
        return [
            'nama_mitra.required'      => 'Nama mitra wajib diisi.',
            'nama_mitra.max'           => 'Nama mitra maksimal 255 karakter.',
            'jenis_kerjasama.required' => 'Jenis kerja sama wajib diisi.',
            'jenis_kerjasama.max'      => 'Jenis kerja sama maksimal 255 karakter.',
            'tanggal_mulai.required'   => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date'       => 'Tanggal mulai harus berupa format tanggal yang valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date'     => 'Tanggal selesai harus berupa format tanggal yang valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
        ];
    }

    /**
     * Menentukan atribut (nama field) yang lebih ramah dibaca user.
     */
    public function attributes(): array
    {
        return [
            'nama_mitra' => 'Nama Mitra',
            'jenis_kerjasama' => 'Jenis Kerja Sama',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
        ];
    }
}
