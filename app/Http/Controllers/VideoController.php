<?php

namespace App\Http\Controllers;

use App\Models\Video;
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
        $builder = Video::query();
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
}
