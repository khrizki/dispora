<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View; // Tambahkan ini
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $now = Carbon::now('Asia/Jakarta');
                $currentTime = $now->format('H:i:s');
                $today = $now->format('Y-m-d');
                $pengumuman = DB::table('pengumuman')
                    ->whereDate('tanggal', $today)
                    ->whereNotNull('jam_selesai')
                    ->where('jam', '<=', $currentTime) // Sudah lewat jam mulai
                    ->where('jam_selesai', '>=', Carbon::parse($currentTime)->subMinute()->format('H:i:s')) // Ditambah 1 menit toleransi
                    ->orderBy('jam', 'asc')
                    ->first(); // Coba tanpa kondisi dulu
                $view->with('pengumuman', $pengumuman);
            } catch (\Exception $e) {
                Log::error('View Composer Error: ' . $e->getMessage());
                $view->with('pengumuman', null);
            }
        });
    }
}
