<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Rusunawa;
use App\Models\SurveyUser;
use Illuminate\Http\Request;
use App\Models\SurveyPertanyaan;
use App\Models\Transparansi;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {

        $berita = Berita::count();
        $pengumumanDashboard = Pengumuman::count();
        $dokumenDashboard = Dokumen::count();
        // $transparansiDashboard = Transparansi::count();
        $galeriDashboard = Galeri::count();
        $videoDashboard = Video::count();
        // $rusunawa = Rusunawa::count();
        $area = Area::count();

        return view('pages.dashboard', compact('berita', 'pengumumanDashboard', 'dokumenDashboard', 'galeriDashboard', 'videoDashboard','area'));
    }
}
