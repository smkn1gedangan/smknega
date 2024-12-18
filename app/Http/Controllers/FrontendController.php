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
use App\Models\Kesiswaan\EkstraPhoto;
use App\Models\Kesiswaan\Osis;
use App\Models\Kesiswaan\OsisPhoto;
use App\Models\Kesiswaan\Pemetaan;
use App\Models\Kesiswaan\Prestasi;
use App\Models\Masukan;
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
use App\Models\Profil\Waka;
use App\Models\Program\Bisnis;
use App\Models\Program\BisnisPhoto;
use App\Models\Program\Bursa;
use App\Models\Program\Industri;
use App\Models\Program\Kerja;
use App\Models\Program\Peraturan;
use App\Models\Sarana;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // private function getLatestYouTubeVideos()
    // {
    //     $channelId = 'UCaW8arAuV0WMEJEzM1rZ1Nw';
    //     $apiKey = env("YOUTUBE_API_KEY");

    //     $client = new Client();

    //     $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channelId&maxResults=2&order=date&key=$apiKey";

    //     $response = $client->get($url);
    //     $data = json_decode($response->getBody()->getContents(), true);

    //     $videos = [];
    //     foreach ($data['items'] as $item) {
    //         $videos[] = [
    //             'videoId' => $item['id']['videoId'],
    //             'title' => $item['snippet']['title'],
    //             'publishedAt' => $item['snippet']['publishedAt'],
    //             'url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
    //             'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
    //         ];
    //     }
    //     return $videos;
    // }
   public function welcome()  {
        $kepsek = Kepsek::latest()->first();
        $wakas = Waka::take(10)->get();
        // $youtubeVideos = $this->getLatestYouTubeVideos();
        $galeris = Galeri::latest()->take(2)->get();
        $prestasis = Article::whereHas("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->latest()->get();
        $articles = Article::whereDoesntHave("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->latest()->get();
        $profil =Profil::first();
        return view("frontend.welcome",compact("articles","kepsek","prestasis","wakas","galeris","profil"));
   }
    public function sambutan_kepsek() {
        $kepsek = Kepsek::first();
        return view("frontend.sambutan_kepsek",compact("kepsek"));
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
        $wakas = Waka::latest()->paginate(10);
        return view("frontend.profil.struktur",compact("struktur","wakas"));
    }
    public function kerja()  {
        $programKerja = Kerja::first();
        return view("frontend.program.kerja",compact("programKerja"));
    }
    public function peraturan()  {
        $peraturan = Peraturan::first();
        return view("frontend.program.Peraturan",compact("peraturan"));
    }
    public function bisnis()  {
        $bisnis = Bisnis::first();
        $bisnisPhoto = BisnisPhoto::latest()->get();
        return view("frontend.program.Bisnis",compact("bisnis","bisnisPhoto"));
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
        $ekstraPhotos = EkstraPhoto::latest()->get();
        return view("frontend.kesiswaan.ekstrakulikuler",compact("ekstrakulikuler","ekstraPhotos"));
    }
    public function osis()  {
        $osis = Osis::first();
        $osisPhotos = OsisPhoto::latest()->get();
        return view("frontend.kesiswaan.osis",compact("osis","osisPhotos"));
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
        return view("frontend.Informasi.guru",compact("gurus","kepsek"));
    }
    public function artikel()  {
        $artikels = Article::latest()->paginate(6);
        $kategoris = Kategori::get();
        return view("frontend.Informasi.artikel",compact("artikels","kategoris"));
    }
    public function sarana()  {
        $sarana = Sarana::first();
        return view("frontend.Informasi.sarana",compact("sarana"));
    }
    public function galeri()  {
        $galeris = Galeri::latest()->paginate(10);
        return view("frontend.Informasi.galeri",compact("galeris"));
    }
    public function jadwal()  {
        return redirect()->away("https://ppdbjatim.net/informasi/jadwal/");
    }
    public function info_ppdb()  {
        return redirect()->away("https://ppdbjatim.net/");
    }
    public function survey()  {
        return redirect()->away("https://surveyminat.smkn1gedangan-malang.sch.id/");
    }
    public function elearning()  {
        return redirect()->back();

    }
    public function islamic()  {
        return redirect()->away("https://imamuslim.vercel.app");

    }

    public function save_masukan(Request $request)  {
        $request->validate([
            "email"=>"email|required|string",
            "nama"=>"required|string",
            "masukan"=>"required|string|min:5",
        ]);
        $email = User::where("email",$request->email)->first();
        if(!$email){
            return redirect()->route("welcome")->with("error","email tidak dikenali , anda harus login terlebih dahulu");
        }


        Masukan::create([
            "nama"=>$request->nama,
            "email"=>$request->masukan,
            "masukan"=>$request->masukan,
        ]);
        return redirect()->route("welcome")->with("success","pesan yang anda masukan telah disimpan ke database");
    }

   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbarus = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();
        return view("frontend.Informasi.readArtikel",compact("article","kategoris","articleTerbarus"));
   }
}
