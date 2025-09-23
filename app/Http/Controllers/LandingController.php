<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Download;
use App\Models\Galeri;
use App\Models\Masyarakat;
use App\Models\Pejabat;
use App\Models\Sosmed;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $video = Video::orderBy('created_at', 'desc')->take(3)->get();
        $galeri = Galeri::orderBy('created_at', 'desc')->take(5)->get();
        $instagram = Sosmed::orderBy('id', 'desc')->take(3)->get();

        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();

        $monthVisitors = Visitor::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $lastMonth = Carbon::now()->subMonth();

        $lastMonthVisitors = Visitor::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $totalVisitors = Visitor::count();

        $infoBergambar = DB::table('info_bergambar')->orderBy('created_at', 'desc')->get();

        $pejabat = Pejabat::where('jabatan', 'Sekretariat Daerah Kominfo')->first();

        return view('landing.index', compact(
            'beritaTerbaru',
            'video',
            'galeri',
            'instagram',
            'todayVisitors',
            'monthVisitors',
            'lastMonthVisitors',
            'totalVisitors',
            'infoBergambar',
            'pejabat'
        ));
    }


    public function landing()
    {
        return view('landing.utama'); // tampilkan splash screen
    }
    public function list()
    {
        $beritaList = Berita::orderBy('id', 'desc')->paginate(10);
        return view('profil.list', compact('beritaList'));
    }
    public function listGaleri()
    {
        $galeriList = Galeri::orderBy('id', 'desc')->paginate(10);
        return view('profil.galeri-list', compact('galeriList'));
    }
}
