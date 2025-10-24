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
use App\Models\HeroSection;

class LandingController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $video = Video::orderBy('created_at', 'desc')->take(3)->get();
        $galeri = Galeri::orderBy('created_at', 'desc')->take(5)->get();
        $instagram = Sosmed::orderBy('id', 'desc')->take(3)->get();

        $infoBergambar = DB::table('info_bergambar')->orderBy('created_at', 'desc')->get();

        $pejabat = Pejabat::where('jabatan', 'Kepala Dinas Perumahan dan Kawasan Permukiman Kota Padang')->first();


        $hero = HeroSection::orderBy('created_at', 'desc')->get();

        return view('landing.index', compact(
            'beritaTerbaru',
            'video',
            'galeri',
            'instagram',
            'infoBergambar',
            'pejabat',
            'hero'
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
        $videoList = Video::orderBy('id', 'desc')->paginate(10);

        return view('profil.galeri-list', compact('galeriList', 'videoList'));
    }

}
