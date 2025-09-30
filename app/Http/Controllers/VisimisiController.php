<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::first(); 
        return view('pages.visimisi.index', compact('visimisi'));
    }

    public function create()
    {
        return view('pages.visimisi.create'); // form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'nullable|string',
        ]);

        // Cegah duplikat - cuma boleh satu data
        if (VisiMisi::exists()) {
            return redirect()->route('pages.visimisi.index')
                ->with('error', 'Data sudah ada. Silakan edit saja.');
        }

        VisiMisi::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('pages.visimisi.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        return view('pages.visimisi.edit', compact('visimisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'nullable|string',
        ]);

        $visimisi = VisiMisi::findOrFail($id);
        $visimisi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('pages.visimisi.index')
                        ->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        $visimisi->delete();

        return redirect()->route('pages.visimisi.index')->with('success', 'Data berhasil dihapus.');
    }
}
