<?php

use App\Http\Controllers\Dashboard\ArtikelController;
use App\Http\Controllers\Dashboard\GaleriController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\Jurusan\AkuntansiController;
use App\Http\Controllers\Dashboard\Jurusan\AnimasiController;
use App\Http\Controllers\Dashboard\Jurusan\BogaController;
use App\Http\Controllers\Dashboard\Jurusan\BusanaController;
use App\Http\Controllers\Dashboard\Jurusan\DkvController;
use App\Http\Controllers\Dashboard\Jurusan\SijaController;
use App\Http\Controllers\Dashboard\Jurusan\TkrController;
use App\Http\Controllers\Dashboard\KepsekController;
use App\Http\Controllers\Dashboard\Profil\DeskripsiKomiteController;
use App\Http\Controllers\Dashboard\Profil\KetuaKomiteController;
use App\Http\Controllers\Dashboard\Profil\KomiteController;
use App\Http\Controllers\Dashboard\Profil\LogoController;
use App\Http\Controllers\Dashboard\Profil\PotensiController;
use App\Http\Controllers\Dashboard\Profil\RencanaController;
use App\Http\Controllers\Dashboard\Profil\SejarahController;
use App\Http\Controllers\Dashboard\Profil\StrukturController;
use App\Http\Controllers\Dashboard\Profil\VisiController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\Program\BisnisController;
use App\Http\Controllers\Dashboard\Program\BisnisPhotoController;
use App\Http\Controllers\Dashboard\Program\BursaController;
use App\Http\Controllers\Dashboard\Program\IndustriController;
use App\Http\Controllers\Dashboard\Program\KerjaController;
use App\Http\Controllers\Dashboard\Program\PeraturanController;
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
        route::get("komite","komite")->name("komite");
        route::get("struktur","struktur")->name("struktur");
    });
    Route::prefix("program")->group(function(){
        route::get("kerja","kerja")->name("kerja");
        route::get("peraturan","peraturan")->name("peraturan");
        route::get("bisnis","bisnis")->name("bisnis");
        route::get("industri","industri")->name("industri");
        route::get("bursa","bursa")->name("bursa");
    });
    Route::prefix("jurusan")->group(function(){
        route::get("sija","sija")->name("sija");
        route::get("animasi","animasi")->name("animasi");
        route::get("dkv","dkv")->name("dkv");
        route::get("tkr","tkr")->name("tkr");
        route::get("boga","boga")->name("boga");
        route::get("busana","busana")->name("busana");
        route::get("akuntansi","akuntansi")->name("akuntansi");
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
    });
    Route::prefix("profil")->group(function(){
        Route::resource("galeri",GaleriController::class);
        Route::resource("sejarah",  SejarahController::class);
        Route::resource("potensi",  PotensiController::class);
        Route::resource("rencana",  RencanaController::class);
        Route::resource("visi",  VisiController::class);
        Route::resource("logo",  LogoController::class);
        Route::resource("deskripsiKomite",  DeskripsiKomiteController::class);
        Route::resource("komite",  KomiteController::class);
        Route::resource("ketuaKomite",  KetuaKomiteController::class);
        Route::resource("struktur",  StrukturController::class);
    });
    Route::prefix("program")->group(function(){
        Route::resource("kerja",KerjaController::class);
        Route::resource("peraturan",PeraturanController::class);
        Route::resource("bisnis",BisnisController::class);
        Route::resource("bisnisPhoto",BisnisPhotoController::class);
        Route::resource("industri",IndustriController::class);
        Route::resource("bursa",BursaController::class);
    });
    Route::prefix("jurusan")->group(function(){
        Route::resource("sija",SijaController::class);
        Route::resource("dkv",DkvController::class);
        Route::resource("animasi",AnimasiController::class);
        Route::resource("tkr",TkrController::class);
        Route::resource("busana",BusanaController::class);
        Route::resource("boga",BogaController::class);
        Route::resource("akuntansi",AkuntansiController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
