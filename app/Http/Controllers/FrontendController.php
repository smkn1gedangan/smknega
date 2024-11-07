<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Kategori;
use App\Models\Kepsek;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function welcome()  {
        $kepsek = Kepsek::latest()->first();
        $gurus = Guru::take(10)->get();
        $galeris = Galeri::latest()->take(4)->get();
        $prestasis = Article::whereHas("kategoris",function($query){
            $query->where("nama","prestasi");
        })->get();
        $articles = Article::whereDoesntHave("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->get();
        return view("frontend.welcome",compact("articles","kepsek","prestasis","gurus","galeris"));
   }
   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbaru = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();
        return view("frontend.Informasi.readArtikel",compact("article","kategoris","articleTerbaru"));
   }
}
