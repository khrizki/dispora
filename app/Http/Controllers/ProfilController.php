<?php

namespace App\Http\Controllers;

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
        return view('profil.transparansi');
    }
}
