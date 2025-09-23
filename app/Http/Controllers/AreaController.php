<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Area::orderBy('id', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl   = route('pages.areas.edit', $row->id);
                    $deleteUrl = route('pages.areas.destroy', $row->id);

                    return '
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="delete-form">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.areas.index');
    }

    public function create()
    {
        return view('pages.areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:areas,nama',
        ]);

        Area::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pages.areas.index')
            ->with('success', 'Area berhasil ditambahkan');
    }

    public function edit(Area $area)
    {
        return view('pages.areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:areas,nama,' . $area->id,
        ]);

        $area->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pages.areas.index')
            ->with('success', 'Area berhasil diperbarui');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json([
            'success' => true,
            'message' => 'Area berhasil dihapus'
        ]);
    }
}
