<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pejabat;
use App\Models\sejarah;
use App\Models\Transparansi;
use App\Models\tupoksi;
use App\Models\lowongan;
use App\Models\PsuContent;
use App\Models\RtlhContent;
use App\Models\visimisi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        $data = visimisi::first(); // ambil 1 record (single)
        return view('profil.visi-misi', compact('data')); // kirim $data ke blade
    }
    public function sejarah()
    {
        $sejarah = sejarah::first();
        return view('profil.sejarah', compact('sejarah'));

    }
    public function tupoksi()
    {
        $tupoksi = tupoksi::orderBy('urutan', 'asc')->get();
        return view('profil.tupoksi', compact('tupoksi'));
    }


    public function pejabatStruktural()
    {
        $pejabat = Pejabat::all();
        return view('profil.pejabat', compact('pejabat'));
    }
    public function transparansi()
    {
        $data = Transparansi::orderBy('id', 'desc')->get();
        return view('profil.transparansi', compact('data'));
    }

    public function lowongan()
    {
        $lowonganList = lowongan::orderBy('id','desc')->get(); 
        return view('profil.lowongan', compact('lowonganList'));
    }

    public function rtlh()
{
    $contents = RtlhContent::active()->ordered()->get();
    return view('profil.rtlhcontent', compact('contents'));
}

    public function psu()
{
    $contents = PsuContent::active()->ordered()->get();
    return view('profil.psucontent', compact('contents'));
}

    public function dokumen(Request $request)
    {
        $query = Dokumen::query();

        // Filter judul
        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        // Filter tahun (kalau pakai created_at)
        if ($request->filled('tanggal')) {
            $query->whereYear('tanggal', $request->tanggal);
        }

        $data = $query->orderBy('id', 'desc')->paginate(10);

        return view('profil.dokumen', compact('data'));
    }
}
