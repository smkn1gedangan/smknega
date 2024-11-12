<?php

use App\Http\Controllers\Dashboard\ArtikelController;
use App\Http\Controllers\Dashboard\GaleriController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\KepsekController;
use App\Http\Controllers\Dashboard\Profil\SejarahController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function(){
    Route::get("/","welcome")->name("welcome")->middleware("pengunjung");
    Route::prefix("profil")->group(function(){
        route::get("sejarah","sejarah")->name("sejarah");
        route::get("potensi","potensi")->name("potensi");
        route::get("rencana","rencana")->name("rencana");
        route::get("visi","visi")->name("visi");
        route::get("logo","logo")->name("logo");
    });
    Route::get("/informasi/article/{slug}","readArticle")->name("readArticle");

});



Route::middleware(['auth', 'verified',"checkRole"])->prefix("be")->group(function () {
    Route::get("/dashboard",[DashboardController::class,"index"])->name("dashboard");
    Route::prefix("welcome")->group(function(){
        Route::resource("profil",ProfilController::class);
        Route::resource("artikel",ArtikelController::class);
        Route::resource("kepsek",KepsekController::class);
        Route::resource("guru",GuruController::class);
        Route::resource("galeri",GaleriController::class);
        Route::resource("sejarah",  SejarahController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
