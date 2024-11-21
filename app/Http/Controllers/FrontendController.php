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
use App\Models\Kesiswaan\Beasiswa;
use App\Models\Kesiswaan\Ekstrakulikuler;
use App\Models\Kesiswaan\Osis;
use App\Models\Kesiswaan\Pemetaan;
use App\Models\Kesiswaan\Prestasi;
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
        return view("frontend.profil.sejarah",compact("sejarah"));
    }
    public function potensi()  {
        $potensi = Potensi::first();
       
        return view("frontend.profil.potensi",compact("potensi"));

    }
    public function rencana()  {
        $rencana = Rencana::first();
        return view("frontend.profil.rencana",compact("rencana"));

    }
    public function visi()  {
        $visiMisi = VisiMisi::first();
        return view("frontend.profil.visi",compact("visiMisi"));
    }

    public function logo()  {
        $logo = Logo::first();
        return view("frontend.profil.logo",compact("logo"));
    }
    public function komite()  {
        $deskripsiKomite = DeskripsiKomite::first();
        $ketuaKomite = KetuaKomite::first();
        $komites = Komite::latest()->paginate(10);
        return view("frontend.profil.komite",compact("komites","deskripsiKomite","ketuaKomite"));
    }
    public function struktur()  {
        $struktur = StrukturOrganisasi::first();
        return view("frontend.profil.struktur",compact("struktur"));
    }
    public function kerja()  {
        $programKerja = Kerja::first();
        return view("frontend.program.kerja",compact("programKerja"));
    }
    public function peraturan()  {
        $peraturan = Peraturan::first();
        return view("frontend.program.peraturan",compact("peraturan"));
    }
    public function bisnis()  {
        $bisnis = Bisnis::first();
        $bisnisPhoto = BisnisPhoto::get();
        return view("frontend.program.bisnis",compact("bisnis","bisnisPhoto"));
    }
    public function industri()  {
        $industri = Industri::first();
        return view("frontend.program.industri",compact("industri"));
    }
    public function bursa()  {
        $bursa = Bursa::first();
        return view("frontend.program.bursa",compact("bursa"));
    }
    public function sija()  {
        $sija = Sija::first();
        return view("frontend.jurusan.sija",compact("sija"));
    }
    public function dkv()  {
        $dkv = Dkv::first();
        return view("frontend.jurusan.dkv",compact("dkv"));
    }
    public function animasi()  {
        $animasi = Animasi::first();
        return view("frontend.jurusan.animasi",compact("animasi"));
    }
    public function tkr()  {
        $tkr = Tkr::first();
        return view("frontend.jurusan.tkr",compact("tkr"));
    }
    public function busana()  {
        $busana = Busana::first();
        return view("frontend.jurusan.busana",compact("busana"));
    }
    public function boga()  {
        $boga = Boga::first();
        return view("frontend.jurusan.boga",compact("boga"));
    }
    public function akuntansi()  {
        $akuntansi = Akuntansi::first();
        return view("frontend.jurusan.akuntansi",compact("akuntansi"));
    }
    public function prestasi()  {
        $prestasis = Prestasi::latest()->paginate(10);
        return view("frontend.kesiswaan.prestasi",compact("prestasis"));
    }
    public function ekstrakulikuler()  {
        $ekstrakulikuler = Ekstrakulikuler::first();
        return view("frontend.kesiswaan.ekstrakulikuler",compact("ekstrakulikuler"));
    }
    public function osis()  {
        $osis = Osis::first();
        return view("frontend.kesiswaan.osis",compact("osis"));
    }
    public function beasiswa()  {
        $beasiswa = Beasiswa::first();
        return view("frontend.kesiswaan.beasiswa",compact("beasiswa"));
    }
    public function pemetaan()  {
        $pemetaan = Pemetaan::first();
        return view("frontend.kesiswaan.pemetaan",compact("pemetaan"));
    }
    public function guru()  {
        $gurus = Guru::latest()->paginate(10);
        $kepsek = Kepsek::latest()->first();
        return view("frontend.informasi.guru",compact("gurus","kepsek"));
    }
    public function artikel()  {
        $artikels = Article::latest()->paginate(5);
        $kategoris = Kategori::get();
        return view("frontend.informasi.artikel",compact("artikels","kategoris"));
    }
    public function sarana()  {
        $gurus = Guru::latest()->paginate(20);
        $kepsek = Kepsek::latest()->first();
        return view("frontend.informasi.guru",compact("gurus","kepsek"));
    }
    public function galeri()  {
        $gurus = Guru::latest()->paginate(20);
        $kepsek = Kepsek::latest()->first();
        return view("frontend.informasi.guru",compact("gurus","kepsek"));
    }
    public function kurikulum()  {
        $gurus = Guru::latest()->paginate(20);
        $kepsek = Kepsek::latest()->first();
        return view("frontend.informasi.guru",compact("gurus","kepsek"));
    }
    
   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbarus = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();
        return view("frontend.Informasi.readArtikel",compact("article","kategoris","articleTerbarus"));
   }
}
