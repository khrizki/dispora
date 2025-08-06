<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Transparansi;
use App\Http\Controllers\TransparansiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\VideoController;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/beranda', [LandingController::class, 'index'])->name('beranda');
Route::prefix('profil')->group(function () {
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/tupoksi', [ProfilController::class, 'tupoksi'])->name('profil.tupoksi');
    Route::get('/pejabat-struktural', [ProfilController::class, 'pejabatStruktural'])->name('profil.pejabat');
});
Route::get('/transparansi-index', [ProfilController::class, 'transparansi'])->name('profil.transparansi');
Route::get('/dokumen-index', [ProfilController::class, 'dokumen'])->name('profil.dokumen');


Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('menu')->group(function () {
        //Transparansi Anggaran
        Route::get('/transparansi', [TransparansiController::class, 'index'])->name('pages.transparansi.index');
        Route::get('/transparansi-create', [TransparansiController::class, 'create'])->name('pages.transparansi.create');
        Route::post('/transparansi-store', [TransparansiController::class, 'store'])->name('pages.transparansi.store');


        //Dokumen Anggaran
        Route::get('/dokumen', [DokumenController::class, 'index'])->name('pages.dokumen.index');
        Route::get('/dokumen-create', [DokumenController::class, 'create'])->name('pages.dokumen.create');
        Route::post('/dokumen-store', [DokumenController::class, 'store'])->name('pages.dokumen.store');


        //Galeri
        Route::get('/galeri', [GaleriController::class, 'index'])->name('pages.galeri.index');
        Route::get('/create-galery', [GaleriController::class, 'create'])->name('pages.galeri.create');
        Route::post('/store-galery', [GaleriController::class, 'store'])->name('pages.galeri.store');

        //Berita
        Route::get('/berita', [BeritaController::class, 'index'])->name('pages.berita.index');
        Route::get('/berita-create', [BeritaController::class, 'create'])->name('pages.berita.create');
        Route::post('/berita/upload-image', [BeritaController::class, 'uploadImage'])->name('berita.upload-image');
        Route::post('/berita/store', [BeritaController::class, 'store'])->name('pages.berita.store');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('pages.berita.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('pages.berita.update');

        //pengumuman
        Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pages.pengumuman.index');
        Route::get('/pengumuman-create', [PengumumanController::class, 'create'])->name('pages.pengumuman.create');
        Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pages.pengumuman.store');


        //Video
        Route::get('/video', [VideoController::class, 'index'])->name('pages.video.index');
        Route::get('/video-create', [VideoController::class, 'create'])->name('pages.video.create');
        Route::post('/video/store', [VideoController::class, 'store'])->name('pages.video.store');

        //sosmed
        Route::get('/sosmed', [SosmedController::class, 'index'])->name('pages.sosmed.index');
    });
});
