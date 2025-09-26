<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HeroSectionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.herosection.index');
    }

    public function dataTable()
    {
        $builder = HeroSection::orderBy('id', 'asc');
        return DataTables::of($builder)
        ->addIndexColumn()
        ->addColumn('preview', function ($row) {
            if ($row->image) {
                $url = asset('storage/' . $row->image);
                return '<img src="' . $url . '" alt="Hero Image" width="150">';
            }
            return '<span class="text-muted">Tidak ada gambar</span>';
        })
        ->addColumn('path', function ($row) {
            return $row->image;
        })
        ->rawColumns(['preview'])
        ->make(true);
    }

    public function create()
    {
        return view('pages.herosection.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
                ],
                [
                    'image.required' => 'Gambar hero wajib diunggah.',
                    'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                    'image.max' => 'Ukuran gambar maksimal 5MB.',
                ]
            );

            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('hero_sections', 'public');
            }

            HeroSection::create([
                'image' => $path,
            ]);

            return redirect()->route('pages.herosection.index')->with('success', 'Gambar berhasil ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $hero = HeroSection::findOrFail($id);
        return view('pages.herosection.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $hero = HeroSection::findOrFail($id);
        $oldImage = $hero->image;

        if ($request->hasFile('image')) {
            // hapus gambar lama
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            $file = $request->file('image');
            $oldImage = $file->store('hero_sections', 'public');
        }

        $hero->update([
            'image' => $oldImage,
        ]);

        return redirect()->route('pages.herosection.index')->with('success', 'Gambar berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            $total = HeroSection::count();
            if ($total <= 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimal harus ada 1 gambar hero section.'
                ]);
            }

            $hero = HeroSection::findOrFail($id);

            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }

            $hero->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gambar hero berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
