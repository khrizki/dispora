<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first(); 
        return view('pages.sejarah.index', compact('sejarah'));
    }

    public function create()
    {
        return view('pages.sejarah.create'); // form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'label' => 'nullable|string|max:50',
        ]);

        // Cegah duplikat - cuma boleh satu data
        if (Sejarah::exists()) {
            return redirect()->route('pages.sejarah.index')
                ->with('error', 'Data sejarah sudah ada. Silakan edit saja.');
        }

        Sejarah::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'label' => $request->label,
        ]);

        return redirect()->route('pages.sejarah.index')->with('success', 'Sejarah berhasil disimpan.');
    }

    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('pages.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'label' => 'nullable|string|max:50',
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'label' => $request->label,
        ]);

        return redirect()->route('pages.sejarah.index')
                        ->with('success', 'Sejarah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();

        return redirect()->route('pages.sejarah.index')->with('success', 'Sejarah berhasil dihapus.');
    }
}
