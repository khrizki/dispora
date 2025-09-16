<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.video.index');
    }

    public function dataTable()
    {
        $builder = Video::orderBy('id', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('pages.video.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'judul_video' => 'required',
                    'video' => 'required|url'
                ]
            );
            if ($validate->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validate->errors()->all()
                ]);
            }
            Video::create([
                'judul_video' => $request->judul_video,
                'video' => $request->video,
            ]);

            return redirect()->route('pages.video.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_video' => 'required',
            'video' => 'required|url'
        ]);
        $video = Video::findOrFail($id);
        $video->update([
            'judul_video' => $request->judul_video,
            'video' => $request->video,
        ]);
        return redirect()->route('pages.video.index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        try {
            $video = Video::find($id);
            $video->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
