<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Download;
use App\Models\Galeri;
use App\Models\Masyarakat;
use App\Models\Sosmed;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {

        $beritaTerbaru = Berita::orderBy('tanggal_berita', 'desc')->take(3)->get();
        $video = Video::orderBy('created_at', 'desc')->take(3)->get();
        $galeri = Galeri::orderBy('created_at', 'desc')->take(5)->get();
        $instagram = Sosmed::orderBy('id', 'desc')->take(3)->get();
        return view('landing.index', compact('beritaTerbaru', 'video', 'galeri', 'instagram'));
    }

    public function landing()
    {
        return view('landing.utama'); // tampilkan splash screen
    }



    public function konsultasi()
    {
        return view('landing.menu', [
            'data' => view('landing.menu.konsultasi')->render(),
        ]);
    }

    public function pengaduan()
    {
        return view('landing.menu', [
            'data' => view('landing.menu.wbs')->render(),
        ]);
    }

    public function pengaduanMasyarakat()
    {
        return view('landing.menu', [
            'data' => view('landing.menu.pengaduan')->render(),
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login.masyarakat')->with('success', 'Akun berhasil dibuat');
    }

    public function artikel() {}
}
