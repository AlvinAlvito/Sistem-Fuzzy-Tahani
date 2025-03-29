<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SiswaMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Daftarkan middleware secara manual
        Route::aliasMiddleware('admin', AdminMiddleware::class);
        Route::aliasMiddleware('siswa', SiswaMiddleware::class);
    }
}
