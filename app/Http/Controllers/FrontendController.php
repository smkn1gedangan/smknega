<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan\Akuntansi;
use App\Models\Jurusan\Animasi;
use App\Models\Jurusan\Boga;
use App\Models\Jurusan\Busana;
use App\Models\Jurusan\Dkv;
use App\Models\Jurusan\Sija;
use App\Models\Jurusan\Tkr;
use App\Models\Kategori;
use App\Models\Kepsek;
use App\Models\Profil;
use App\Models\Profil\DeskripsiKomite;
use App\Models\Profil\KetuaKomite;
use App\Models\Profil\Komite;
use App\Models\Profil\Logo;
use App\Models\Profil\Potensi;
use App\Models\Profil\Rencana;
use App\Models\Profil\Sejarah;
use App\Models\Profil\StrukturOrganisasi;
use App\Models\Profil\VisiMisi;
use App\Models\Program\Bisnis;
use App\Models\Program\BisnisPhoto;
use App\Models\Program\Bursa;
use App\Models\Program\Industri;
use App\Models\Program\Kerja;
use App\Models\Program\Peraturan;
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
    public function potensi()  {
        $potensi = Potensi::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.potensi",compact("potensi","articleTerbarus","galeris"));

    }
    public function rencana()  {
        $rencana = Rencana::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.rencana",compact("rencana","articleTerbarus","galeris"));

    }
    public function visi()  {
        $visiMisi = VisiMisi::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.visi",compact("visiMisi","articleTerbarus","galeris"));
    }

    public function logo()  {
        $logo = Logo::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.logo",compact("logo","articleTerbarus","galeris"));
    }
    public function komite()  {
        $deskripsiKomite = DeskripsiKomite::first();
        $ketuaKomite = KetuaKomite::first();
        $komites = Komite::latest()->paginate(10);
        return view("frontend.profil.komite",compact("komites","deskripsiKomite","ketuaKomite"));
    }
    public function struktur()  {
        $struktur = StrukturOrganisasi::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.profil.struktur",compact("struktur","galeris","articleTerbarus"));
    }
    public function kerja()  {
        $programKerja = Kerja::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.program.kerja",compact("programKerja","galeris","articleTerbarus"));
    }
    public function peraturan()  {
        $peraturan = Peraturan::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.program.peraturan",compact("peraturan","galeris","articleTerbarus"));
    }
    public function bisnis()  {
        $bisnis = Bisnis::first();
        $bisnisPhoto = BisnisPhoto::get();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.program.bisnis",compact("bisnis","galeris","articleTerbarus","bisnisPhoto"));
    }
    public function industri()  {
        $industri = Industri::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.program.industri",compact("industri","galeris","articleTerbarus"));
    }
    public function bursa()  {
        $bursa = Bursa::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.program.bursa",compact("bursa","galeris","articleTerbarus"));
    }
    public function sija()  {
        $sija = Sija::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.sija",compact("sija","articleTerbarus","galeris"));
    }
    public function dkv()  {
        $dkv = Dkv::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.dkv",compact("dkv","articleTerbarus","galeris"));
    }
    public function animasi()  {
        $animasi = Animasi::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.animasi",compact("animasi","articleTerbarus","galeris"));
    }
    public function tkr()  {
        $tkr = Tkr::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.tkr",compact("tkr","articleTerbarus","galeris"));
    }
    public function busana()  {
        $busana = Busana::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.busana",compact("busana","articleTerbarus","galeris"));
    }
    public function boga()  {
        $boga = Boga::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.boga",compact("boga","articleTerbarus","galeris"));
    }
    public function akuntansi()  {
        $akuntansi = Akuntansi::first();
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view("frontend.jurusan.akuntansi",compact("akuntansi","articleTerbarus","galeris"));
    }
   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbarus = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();
        return view("frontend.Informasi.readArtikel",compact("article","kategoris","articleTerbarus"));
   }
}
