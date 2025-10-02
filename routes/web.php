<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Transparansi;
use App\Http\Controllers\TransparansiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InfoBergambarController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\VideoController;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NavbarItemController;
use App\Http\Controllers\RusunawaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\VisiMisiController;

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
Route::get('/caripengumuman', [PengumumanController::class, 'show'])->name('profil.pengumuman');

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita-list', [LandingController::class, 'list'])->name('profil.list');
Route::get('/galeri-list', [LandingController::class, 'listGaleri'])->name('profil.galeriList');

Route::get('/carirusunawa', [RusunawaController::class, 'show'])->name('profil.rusunawa');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('menu')->group(function () {
        
        // Navbar
        Route::get('/navbar', [NavbarItemController::class, 'index'])->name('pages.navbar.index');
        Route::get('/navbar-create', [NavbarItemController::class, 'create'])->name('pages.navbar.create');
        Route::post('/navbar-store', [NavbarItemController::class, 'store'])->name('pages.navbar.store');
        Route::get('/navbar/{id}/edit', [NavbarItemController::class, 'edit'])->name('pages.navbar.edit');
        Route::put('/navbar/{id}', [NavbarItemController::class, 'update'])->name('pages.navbar.update');
        Route::delete('/navbar-destroy/{id}', [NavbarItemController::class, 'destroy'])->name('pages.navbar.destroy');

        //Hero Section
        Route::get('/herosection', [HeroSectionController::class, 'index'])->name('pages.herosection.index');
        Route::get('/herosection-create', [HeroSectionController::class, 'create'])->name('pages.herosection.create');
        Route::post('/herosection-store', [HeroSectionController::class, 'store'])->name('pages.herosection.store');
        Route::delete('/herosection-destroy/{id}', [HeroSectionController::class, 'destroy'])->name('pages.herosection.destroy');
        Route::get('/herosection/{id}/edit', [HeroSectionController::class, 'edit'])->name('pages.herosection.edit');
        Route::put('/herosection/{id}', [HeroSectionController::class, 'update'])->name('pages.herosection.update');


        //Transparansi Anggaran
        Route::get('/transparansi', [TransparansiController::class, 'index'])->name('pages.transparansi.index');
        Route::get('/transparansi-create', [TransparansiController::class, 'create'])->name('pages.transparansi.create');
        Route::post('/transparansi-store', [TransparansiController::class, 'store'])->name('pages.transparansi.store');
        Route::delete('/transparansi-destroy/{id}', [TransparansiController::class, 'destroy'])->name('pages.transparansi.destroy');
        Route::get('/transparansi/{id}/edit', [TransparansiController::class, 'edit'])->name('pages.transparansi.edit');
        Route::put('/transparansi/{id}', [TransparansiController::class, 'update'])->name('pages.transparansi.update');

        //Rusunawa
        Route::get('/rusunawa', [RusunawaController::class, 'index'])->name('pages.rusunawa.index');
        Route::get('/rusunawa-create', [RusunawaController::class, 'create'])->name('pages.rusunawa.create');
        Route::post('/rusunawa-store', [RusunawaController::class, 'store'])->name('pages.rusunawa.store');
        Route::get('/rusunawa/{rusunawa}/edit', [RusunawaController::class, 'edit'])->name('pages.rusunawa.edit');
        Route::put('/rusunawa/{rusunawa}', [RusunawaController::class, 'update'])->name('pages.rusunawa.update');
        Route::delete('/rusunawa-destroy/{rusunawa}', [RusunawaController::class, 'destroy'])->name('pages.rusunawa.destroy');
        
       // Area
        Route::get('/areas', [AreaController::class, 'index'])->name('pages.areas.index');
        Route::get('/areas-create', [AreaController::class, 'create'])->name('pages.areas.create');
        Route::post('/areas-store', [AreaController::class, 'store'])->name('pages.areas.store');
        Route::get('/areas/{area}/edit', [AreaController::class, 'edit'])->name('pages.areas.edit');
        Route::put('/areas/{area}', [AreaController::class, 'update'])->name('pages.areas.update');
        Route::delete('/areas-destroy/{area}', [AreaController::class, 'destroy'])->name('pages.areas.destroy');

       // Visi & Misi (ikut format Rusunawa)
        Route::get('/visimisi', [VisiMisiController::class, 'index'])->name('pages.visimisi.index'); // list (kalau kosong tombol tambah, kalau ada tombol edit)
        Route::get('/visimisi-create', [VisiMisiController::class, 'create'])->name('pages.visimisi.create'); // form tambah
        Route::post('/visimisi-store', [VisiMisiController::class, 'store'])->name('pages.visimisi.store'); // simpan baru
        Route::get('/visimisi/{visimisi}/edit', [VisiMisiController::class, 'edit'])->name('pages.visimisi.edit'); // form edit
        Route::put('/visimisi/{visimisi}', [VisiMisiController::class, 'update'])->name('pages.visimisi.update'); // update
        Route::delete('/visimisi-destroy/{visimisi}', [VisiMisiController::class, 'destroy'])->name('pages.visimisi.destroy'); // delete

        //tupoksi
        Route::get('/tupoksi', [TupoksiController::class, 'index'])->name('pages.tupoksi.index');
        Route::get('/tupoksi/create', [TupoksiController::class, 'create'])->name('pages.tupoksi.create');
        Route::post('/tupoksi/store', [TupoksiController::class, 'store'])->name('pages.tupoksi.store');
        Route::get('/tupoksi/{tupoksi}/edit', [TupoksiController::class, 'edit'])->name('pages.tupoksi.edit');
        Route::put('/tupoksi/{tupoksi}', [TupoksiController::class, 'update'])->name('pages.tupoksi.update');
        Route::delete('/tupoksi/{tupoksi}', [TupoksiController::class, 'destroy'])->name('pages.tupoksi.destroy');
        
        /// sejarah
        Route::get('/sejarah', [SejarahController::class, 'index'])->name('pages.sejarah.index');
        Route::get('/sejarah/create', [SejarahController::class, 'create'])->name('pages.sejarah.create');
        Route::post('/sejarah/store', [SejarahController::class, 'store'])->name('pages.sejarah.store');
        Route::get('/sejarah/{sejarah}/edit', [SejarahController::class, 'edit'])->name('pages.sejarah.edit');
        Route::put('/sejarah/{sejarah}', [SejarahController::class, 'update'])->name('pages.sejarah.update');
        Route::delete('/sejarah/{sejarah}', [SejarahController::class, 'destroy'])->name('pages.sejarah.destroy');



        //Dokumen Anggaran
        Route::get('/dokumen', [DokumenController::class, 'index'])->name('pages.dokumen.index');
        Route::get('/dokumen-create', [DokumenController::class, 'create'])->name('pages.dokumen.create');
        Route::post('/dokumen-store', [DokumenController::class, 'store'])->name('pages.dokumen.store');
        Route::delete('/dokumen-delete/{id}', [DokumenController::class, 'destroy'])->name('pages.dokumen.destroy');
        Route::get('/dokumen/{id}/edit', [DokumenController::class, 'edit'])->name('pages.dokumen.edit');
        Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('pages.dokumen.update');


        //Galeri
        Route::get('/galeri', [GaleriController::class, 'index'])->name('pages.galeri.index');
        Route::get('/create-galery', [GaleriController::class, 'create'])->name('pages.galeri.create');
        Route::post('/store-galery', [GaleriController::class, 'store'])->name('pages.galeri.store');
        Route::delete('/destroy-galeri/{id}', [GaleriController::class, 'destroy'])->name('pages.galeri.destroy');
        Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('pages.galeri.edit');
        Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('pages.galeri.update');

        //Berita
        Route::get('/berita', [BeritaController::class, 'index'])->name('pages.berita.index');
        Route::get('/berita-create', [BeritaController::class, 'create'])->name('pages.berita.create');
        Route::post('/berita/upload-image', [BeritaController::class, 'uploadImage'])->name('berita.upload-image');
        Route::post('/berita/store', [BeritaController::class, 'store'])->name('pages.berita.store');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('pages.berita.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('pages.berita.update');
        Route::delete('/berita-destroy/{id}', [BeritaController::class, 'destroy'])->name('pages.berita.destroy');

        //pengumuman
        Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pages.pengumuman.index');
        Route::get('/pengumuman-create', [PengumumanController::class, 'create'])->name('pages.pengumuman.create');
        Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pages.pengumuman.store');
        Route::delete('/pengumuman-destroy/{id}', [PengumumanController::class, 'destroy'])->name('pages.pengumuman.destroy');
        Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pages.pengumuman.edit');
        Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pages.pengumuman.update');

        //Video
        Route::get('/video', [VideoController::class, 'index'])->name('pages.video.index');
        Route::get('/video-create', [VideoController::class, 'create'])->name('pages.video.create');
        Route::post('/video/store', [VideoController::class, 'store'])->name('pages.video.store');
        Route::delete('/delete-video/{id}', [VideoController::class, 'destroy'])->name('pages.video.destroy');
        Route::get('/video/{id}/eedit', [VideoController::class, 'edit'])->name('pages.video.edit');
        Route::put('/video/{id}', [VideoController::class, 'update'])->name('pages.video.update');


        //info bergambar
        Route::get('/info-bergambar', [InfoBergambarController::class, 'index'])->name('pages.info.index');
        Route::get('/info-create', [InfoBergambarController::class, 'create'])->name('pages.info.create');
        Route::post('/info-store', [InfoBergambarController::class, 'store'])->name('pages.info.store');
        Route::get('/info-edit/{id}', [InfoBergambarController::class, 'edit'])->name('pages.info.edit');
        Route::put('/info-update/{id}', [InfoBergambarController::class, 'update'])->name('pages.info.update');
        Route::delete('/delete-info/{id}', [InfoBergambarController::class, 'destroy'])->name('pages.info.destroy');

        //sosmed
        Route::get('/sosmed', [SosmedController::class, 'index'])->name('pages.sosmed.index');

        //pejabat struktural 
        Route::get('/pejabat-struktural', [PejabatController::class, 'index'])->name('pages.struktural.index');
        Route::get('/pejabat-struktural-create', [PejabatController::class, 'create'])->name('pages.struktural.create');
        Route::post('/pejabat-struktural-store', [PejabatController::class, 'store'])->name('pages.struktural.store');
        Route::get('/struktural-edit/{id}', [PejabatController::class, 'edit'])->name('pages.struktural.edit');
        Route::put('/struktural/{id}', [PejabatController::class, 'update'])->name('pages.struktural.update');
        Route::delete('/delete-struktural/{id}', [PejabatController::class, 'destroy'])->name('pages.struktural.destroy');

        //Rusunawa
        Route::get('/rusunawa', [RusunawaController::class, 'index'])->name('pages.rusunawa.index');
        Route::get('/rusunawa-create', [RusunawaController::class, 'create'])->name('pages.rusunawa.create');
        Route::post('/rusunawa-store', [RusunawaController::class, 'store'])->name('pages.rusunawa.store');
        Route::get('/rusunawa/{id}/edit', [RusunawaController::class, 'edit'])->name('pages.rusunawa.edit');
        Route::put('/rusunawa/{id}', [RusunawaController::class, 'update'])->name('pages.rusunawa.update');
        Route::delete('/rusunawa-destroy/{id}', [RusunawaController::class, 'destroy'])->name('pages.rusunawa.destroy');

    });
});
