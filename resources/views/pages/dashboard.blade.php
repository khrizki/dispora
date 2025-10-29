@extends('layouts.main')

@section('title', 'Dashboard DISPORA')

@section('content')
<div class="space-y-8">
    {{-- 🏠 Header --}}
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard DISPORA Kota Padang</h1>
            <p class="text-gray-500 text-sm mt-1">
                <i class="bi bi-calendar-check"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div class="bg-blue-100 text-blue-600 rounded-full p-3">
            <i class="bi bi-speedometer2 text-2xl"></i>
        </div>
    </div>

    {{-- 📊 Statistik Singkat --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4 hover:shadow-md transition">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                <i class="bi bi-newspaper text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Berita</p>
                <h2 class="text-2xl font-bold">128</h2>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4 hover:shadow-md transition">
            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                <i class="bi bi-bullseye text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Program Aktif</p>
                <h2 class="text-2xl font-bold">45</h2>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4 hover:shadow-md transition">
            <div class="bg-amber-100 text-amber-500 p-3 rounded-lg">
                <i class="bi bi-activity text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Kegiatan Bulan Ini</p>
                <h2 class="text-2xl font-bold">12</h2>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4 hover:shadow-md transition">
            <div class="bg-red-100 text-red-500 p-3 rounded-lg">
                <i class="bi bi-people-fill text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Komunitas Terdaftar</p>
                <h2 class="text-2xl font-bold">73</h2>
            </div>
        </div>
    </div>

    {{-- 📅 Agenda Kegiatan --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <i class="bi bi-calendar-event"></i> Agenda Kegiatan Terbaru
            </h2>
            <a href="#" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-100 text-sm text-gray-700">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama Kegiatan</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">Turnamen Futsal Pelajar</td>
                        <td class="px-4 py-2">12 November 2025</td>
                        <td class="px-4 py-2">GOR Agus Salim</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Berjalan</span>
                        </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">Pelatihan Kepemimpinan Pemuda</td>
                        <td class="px-4 py-2">20 November 2025</td>
                        <td class="px-4 py-2">Hotel Grand Zuri</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Akan Datang</span>
                        </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">Senam Bersama Masyarakat</td>
                        <td class="px-4 py-2">27 November 2025</td>
                        <td class="px-4 py-2">Lapangan Imam Bonjol</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">Terjadwal</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- 🤝 Kerja Sama --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-handshake"></i> Kerja Sama Aktif
            </h2>
            <a href="#" class="text-blue-600 text-sm hover:underline">Lihat Detail</a>
        </div>

        <ul class="space-y-3">
            <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                <div>
                    <h6 class="font-semibold text-gray-800">Universitas Andalas</h6>
                    <p class="text-sm text-gray-500">Kerja Sama Penelitian Olahraga</p>
                </div>
                <span class="text-xs px-2 py-1 bg-green-100 text-green-600 rounded-full">Aktif</span>
            </li>
            <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                <div>
                    <h6 class="font-semibold text-gray-800">PT Semen Padang</h6>
                    <p class="text-sm text-gray-500">Program Pembinaan Atlet</p>
                </div>
                <span class="text-xs px-2 py-1 bg-blue-100 text-blue-600 rounded-full">Berjalan</span>
            </li>
            <li class="flex items-center justify-between">
                <div>
                    <h6 class="font-semibold text-gray-800">Bank Nagari</h6>
                    <p class="text-sm text-gray-500">Sponsor Event DISPORA Cup</p>
                </div>
                <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-600 rounded-full">Rencana</span>
            </li>
        </ul>
    </div>
</div>
@endsection
