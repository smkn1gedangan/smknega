<?php

use App\Http\Controllers\Dashboard\ArtikelController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function(){
    Route::get("/","welcome")->name("welcome");
   
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get("/dashboard",function(){
        return view('backend.dashboard');
    });
    Route::resource("artikel",ArtikelController::class);    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
