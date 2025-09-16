<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class SosmedController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }
        return view('pages.sosmed.index');
    }

    public function dataTable()
    {
        $builder = Sosmed::query();
        return DataTables::of($builder)
            ->addIndexColumn()
            ->make(true);
    }
}
