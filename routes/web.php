<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarItemController;
use App\Http\Controllers\backend\GaleriController;
use App\Http\Controllers\Backend\JenisKerjaSamaController;
use App\Http\Controllers\backend\KerjasamaController;
use App\Http\Controllers\backend\PejabatController;
use App\Http\Controllers\backend\SejarahController;
use App\Http\Controllers\backend\TupoksiController;
use App\Http\Controllers\backend\VideoController;
use App\Http\Controllers\backend\VisiMisiController;
use App\Http\Controllers\InfoBergambarController;
use App\Models\JenisKerjaSama;

Route::get('/', [LandingController::class, 'index'])->name('beranda');
Route::get('/beranda', [LandingController::class, 'landing'])->name('landing');
Route::prefix('profil')->group(function () {
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/tupoksi', [ProfilController::class, 'tupoksi'])->name('profil.tupoksi');
    Route::get('/pejabat-struktural', [ProfilController::class, 'pejabatStruktural'])->name('profil.pejabat');
    Route::get('/lowongan', [ProfilController::class, 'lowongan'])->name('profil.lowongan');
    Route::get('/rtlh', [ProfilController::class, 'rtlh'])->name('profil.rtlh');
    Route::get('/psu', [ProfilController::class, 'psu'])->name('profil.psu');
});
// Route::get('/rusunawa/{rusunawa_id}/detail', [RusunawaController::class, 'showDetail'])->name('rusunawa.detail');
Route::get('/transparansi-index', [ProfilController::class, 'transparansi'])->name('profil.transparansi');
Route::get('/dokumen-index', [ProfilController::class, 'dokumen'])->name('profil.dokumen');
// Route::get('/caripengumuman', [PengumumanController::class, 'show'])->name('profil.pengumuman');

// Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita-list', [LandingController::class, 'list'])->name('profil.list');
Route::get('/galeri-list', [LandingController::class, 'listGaleri'])->name('profil.galeriList');

Auth::routes(['register' => false]);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('navbar', NavbarItemController::class);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('menu')->group(function () {});
    Route::resource('kerja-sama', KerjasamaController::class)
        ->names('admin.kerja-sama')
        ->parameters(['kerja-sama' => 'slug']);

    Route::resource('jenis-kerja-sama', JenisKerjaSamaController::class)
        ->names('admin.jenis-kerja-sama')
        ->parameters(['jenis-kerja-sama' => 'id']);

    Route::resource('galeri', GaleriController::class)->names('pages.galeri');

    // Visi & Misi
    Route::resource('visimisi', VisiMisiController::class)
        ->names('pages.visimisi')
        ->except(['show']);

    // Tupoksi
    Route::resource('tupoksi', TupoksiController::class)
        ->names('pages.tupoksi')
        ->except(['show']);

    // Sejarah
    Route::resource('sejarah', SejarahController::class)
        ->names('pages.sejarah')
        ->except(['show']);

    Route::resource('pejabat-struktural', PejabatController::class)
        ->names('pages.struktural')
        ->except(['show']);

    Route::resource('info-bergambar', InfoBergambarController::class)
        ->names('pages.info')
        ->except(['show']);

    Route::resource('video', VideoController::class)
        ->names('pages.video')
        ->except(['show']);
    // Berita
    Route::resource('berita', BeritaController::class)
        ->names('pages.berita')
        ->except(['show']);

    // Route tambahan untuk upload gambar
    Route::post('/berita/upload-image', [BeritaController::class, 'uploadImage'])
        ->name('berita.upload-image');
});
