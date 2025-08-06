<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Transparansi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('profil.visi-misi');
    }
    public function sejarah()
    {
        return view('profil.sejarah');
    }
    public function tupoksi()
    {
        return view('profil.tupoksi');
    }

    public function pejabatStruktural()
    {
        return view('profil.pejabat');
    }
    public function transparansi()
    {
        $data = Transparansi::all();
        return view('profil.transparansi', compact('data'));
    }

    public function dokumen()
    {
        $data = Dokumen::all();
        return view('profil.dokumen', compact('data'));
    }
}
