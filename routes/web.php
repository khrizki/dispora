<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarItemController;
use App\Http\Controllers\backend\KerjasamaController;

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

Auth::routes(['register' => false]);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('navbar', NavbarItemController::class);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('menu')->group(function () {
    });
    Route::resource('kerja-sama',KerjasamaController::class)->names('admin.kerja-sama');
});
