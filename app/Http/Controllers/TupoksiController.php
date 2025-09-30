<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use Illuminate\Http\Request;

class TupoksiController extends Controller
{
    public function index()
    {
        $tupoksi = Tupoksi::orderBy('urutan')->get();
        return view('pages.tupoksi.index', compact('tupoksi'));
    }

    public function create()
    {
        return view('pages.tupoksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan'   => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'fungsi'    => 'nullable|string',
            'urutan'    => 'nullable|integer',
        ]);

        Tupoksi::create($request->all());

        return redirect()->route('pages.tupoksi.index')
            ->with('success', 'Data Tupoksi berhasil ditambahkan.');
    }

    public function edit(Tupoksi $tupoksi)
    {
        return view('pages.tupoksi.edit', compact('tupoksi'));
    }

    public function update(Request $request, Tupoksi $tupoksi)
    {
        $request->validate([
            'jabatan'   => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'fungsi'    => 'nullable|string',
            'urutan'    => 'nullable|integer',
        ]);

        $tupoksi->update($request->all());

        return redirect()->route('pages.tupoksi.index')
            ->with('success', 'Data Tupoksi berhasil diperbarui.');
    }

    public function destroy(Tupoksi $tupoksi)
    {
        $tupoksi->delete();

        return redirect()->route('pages.tupoksi.index')
            ->with('success', 'Data Tupoksi berhasil dihapus.');
    }
}
