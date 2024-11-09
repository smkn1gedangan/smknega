<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Kategori;
use App\Models\Kepsek;
use App\Models\Profil;
use App\Models\Profil\Sejarah;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function welcome()  {
        $kepsek = Kepsek::latest()->first();
        $gurus = Guru::take(10)->get();
        $galeris = Galeri::latest()->take(2)->get();
        $prestasis = Article::whereHas("kategoris",function($query){
            $query->where("nama","prestasi");
        })->get();
        $articles = Article::whereDoesntHave("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->get();
        $profil =Profil::first();
        return view("frontend.welcome",compact("articles","kepsek","prestasis","gurus","galeris","profil"));
   }
    public function sejarah()  {
        $sejarah = Sejarah::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.sejarah",compact("sejarah","articleTerbarus","galeris"));
    }


   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbarus = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();
        return view("frontend.Informasi.readArtikel",compact("article","kategoris","articleTerbarus"));
   }
}
