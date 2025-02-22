<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\Dashboard\Informasi\ArtikelController;
use App\Http\Controllers\Dashboard\Informasi\DriveController;
use App\Http\Controllers\Dashboard\Informasi\GaleriController;
use App\Http\Controllers\Dashboard\Informasi\GuruController;
use App\Http\Controllers\Dashboard\Informasi\SaranaController;
use App\Http\Controllers\Dashboard\Jurusan\AkuntansiController;
use App\Http\Controllers\Dashboard\Jurusan\AnimasiController;
use App\Http\Controllers\Dashboard\Jurusan\BogaController;
use App\Http\Controllers\Dashboard\Jurusan\BusanaController;
use App\Http\Controllers\Dashboard\Jurusan\DkvController;
use App\Http\Controllers\Dashboard\Jurusan\SijaController;
use App\Http\Controllers\Dashboard\Jurusan\TkrController;
use App\Http\Controllers\Dashboard\KepsekController;
use App\Http\Controllers\Dashboard\Kesiswaan\BeasiswaController;
use App\Http\Controllers\Dashboard\Kesiswaan\EkstrakulikulerController;
use App\Http\Controllers\Dashboard\Kesiswaan\EkstraPhotoController;
use App\Http\Controllers\Dashboard\Kesiswaan\OsisController;
use App\Http\Controllers\Dashboard\Kesiswaan\OsisPhotoController;
use App\Http\Controllers\Dashboard\Kesiswaan\PrestasiController;
use App\Http\Controllers\Dashboard\LinkController;
use App\Http\Controllers\Dashboard\Profil\DeskripsiKomiteController;
use App\Http\Controllers\Dashboard\Profil\KetuaKomiteController;
use App\Http\Controllers\Dashboard\Profil\KomiteController;
use App\Http\Controllers\Dashboard\Profil\LogoController;
use App\Http\Controllers\Dashboard\Profil\PotensiController;
use App\Http\Controllers\Dashboard\Profil\RencanaController;
use App\Http\Controllers\Dashboard\Profil\SejarahController;
use App\Http\Controllers\Dashboard\Profil\StrukturController;
use App\Http\Controllers\Dashboard\Profil\VisiController;
use App\Http\Controllers\Dashboard\Profil\WakaController;
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

Route::resource("captcha",CaptchaController::class);
Route::controller(FrontendController::class)->middleware(["monitorPage"])->group(function(){
    Route::get("/","welcome")->name("welcome");
    Route::get("sambutan_kepsek","sambutan_kepsek")->name("sambutan_kepsek");
    Route::post("save_masukan","save_masukan")->name("save_masukan");
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
    Route::prefix("kesiswaan")->group(function(){
        route::get("prestasi","prestasi")->name("prestasi");
        route::get("ekstrakulikuler","ekstrakulikuler")->name("ekstrakulikuler");
        route::get("osis","osis")->name("osis");
        route::get("beasiswa","beasiswa")->name("beasiswa");
    });
    Route::prefix("informasi")->group(function(){
        route::get("guru","guru")->name("guru");
        route::get("artikel","artikel")->name("artikel");
        route::get("sarana","sarana")->name("sarana");
        route::get("galeri","galeri")->name("galeri");
        route::get("drive","drive")->name("drive");
        route::get("elearning","elearning")->name("elearning");
    });
    Route::prefix("ppdb")->group(function(){
        route::get("jadwal","jadwal")->name("jadwal");
        route::get("info_ppdb","info_ppdb")->name("info_ppdb");
        route::get("survey","survey")->name("survey");
    });
    Route::get("/informasi/article/{slug}","readArticle")->name("readArticle");

});

Route::middleware(['auth', 'verified',"checkRole","cache"])->prefix("be")->group(function () {
    Route::get("/dashboard",[DashboardController::class,"index"])->name("dashboard");
    Route::get("/profile-user/{id}",[DashboardController::class,"profileUser"])->name("profile-user");
    Route::delete("/delete-masukan/{id}",[DashboardController::class,"deleteMasukan"])->name("deleteMasukan");
    Route::prefix("welcome")->group(function(){
        Route::resource("profil",ProfilController::class);
        Route::resource("kepsek",KepsekController::class);
        Route::resource("link",LinkController::class);
    });

    Route::prefix("profil")->group(function(){

        Route::resource("sejarah",  SejarahController::class);
        Route::resource("potensi",  PotensiController::class);
        Route::resource("rencana",  RencanaController::class);
        Route::resource("visi",  VisiController::class);
        Route::resource("logo",  LogoController::class);
        Route::resource("deskripsiKomite",  DeskripsiKomiteController::class);
        Route::resource("komite",  KomiteController::class);
        Route::resource("ketuaKomite",  KetuaKomiteController::class);
        Route::resource("struktur",  StrukturController::class);
        Route::resource("waka",  WakaController::class);
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
    Route::prefix("kesiswaan")->group(function(){
        Route::resource("prestasi",PrestasiController::class);
        Route::resource("ekstrakulikuler",EkstrakulikulerController::class);
        Route::resource("osis",OsisController::class);
        Route::resource("beasiswa",BeasiswaController::class);
        Route::resource("ekstraPhoto",EkstraPhotoController::class);
        Route::resource("osisPhoto",OsisPhotoController::class);
    });
    Route::prefix("informasi")->group(function(){
        Route::resource("artikel",ArtikelController::class);
        Route::resource("guru",GuruController::class);
        Route::resource("galeri",GaleriController::class);
        Route::resource("drive",DriveController::class);
        Route::resource("sarana",SaranaController::class);

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
