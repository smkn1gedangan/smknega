<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Drive;
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
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        $kepsek = Cache::remember("kepsek", 60 * 60 * 24 * 7 , function(){
            return Kepsek::latest()->first();
        });
        $wakas = Cache::remember("wakas_take_10", 60 * 60 * 24 * 7 , function(){
            return Waka::take(10)->get();
        });
        $galeris = Cache::remember("galeris_take_2", 60 * 60 * 24 * 7 , function(){
            return Galeri::latest()->take(2)->get();
        });
        // $youtubeVideos = $this->getLatestYouTubeVideos();
        $prestasis = Cache::remember("articles_by_prestatis_take_5", 60 * 60 * 24 * 7 , function(){
            return Article::with(["kategoris"])->whereHas("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->latest()->get();
        });
        $articles = Cache::remember("articles_by_not_prestatis_take_5", 60 * 60 * 24 * 7 , function(){
            return Article::with(["kategoris"])->whereDoesntHave("kategoris",function($query){
            $query->where("nama","prestasi");
        })->take(5)->latest()->get();
        });

        $profil = Cache::remember("profil",60 * 60* 24 * 7,function(){
            return Profil::first();
        });
        return view("frontend.welcome",compact("articles","kepsek","prestasis","wakas","galeris","profil"));
   }
    public function sambutan_kepsek() {
        $kepsek = Cache::remember("kepsek", 60 * 60 * 24 * 7 , function(){
            return Kepsek::latest()->first();
        });
        return view("frontend.sambutan_kepsek",compact("kepsek"));
    }
    public function sejarah()  {
        $sejarah = Cache::remember("sejarah",60 * 60 * 24 * 7,function(){
            return Sejarah::first();
        });
        return view("frontend.profil.sejarah",compact("sejarah"));
    }
    public function potensi()  {
        $potensi = Cache::remember("potensi",60 * 60 * 24 * 7 , function(){
            return Potensi::first();
        });

        return view("frontend.profil.potensi",compact("potensi"));

    }
    public function rencana()  {
        $rencana = Cache::remember("rencana",60 * 60 * 24 * 7 , function(){
            return Rencana::first();
        });
        return view("frontend.profil.rencana",compact("rencana"));

    }
    public function visi()  {
        $visiMisi = Cache::remember("visi",60 * 60 * 24 * 7,function(){
            return VisiMisi::first();
        });
        return view("frontend.profil.visi",compact("visiMisi"));
    }

    public function logo()  {
        $logo = Cache::remember("logos",60 * 60 * 24 * 7,function(){
            return Logo::first();
        });
        return view("frontend.profil.logo",compact("logo"));
    }
    public function komite()  {
        $deskripsiKomite = Cache::remember("dKomite",60 * 60 * 24 * 7 , function(){
            return  DeskripsiKomite::first();
        });
        $datas = Cache::remember('komites', 60, function () {
            return Komite::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $komites = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        $ketuaKomite = Cache::remember("ketuaKomite",60 * 60 * 24 * 7,function(){
            return KetuaKomite::first();
        });
        return view("frontend.profil.komite",compact("komites","deskripsiKomite","ketuaKomite"));
    }
    public function struktur()  {
        $struktur = Cache::remember("struktur",60 * 60 * 24 * 7,function(){
            return StrukturOrganisasi::first();
        });
        $datas = Cache::remember('wakas', 60, function () {
            return Waka::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $wakas = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("frontend.profil.struktur",compact("struktur","wakas"));
    }
    public function kerja()  {
        $programKerja = Cache::remember("kerja",60 * 60 * 24 * 7 , function(){
            return Kerja::first();
        });
        return view("frontend.program.kerja",compact("programKerja"));
    }
    public function peraturan()  {
        $peraturan = Cache::remember("peraturan",60 * 60 * 24 * 7 , function(){
            return Peraturan::first();
        });
        return view("frontend.program.Peraturan",compact("peraturan"));
    }
    public function bisnis()  {
        $bisnisPhoto = Cache::remember('bisnisPhotos_getAll', 60 * 60 * 24 * 7, function () {
            return BisnisPhoto::latest()->get(); // seluruh data guru
        });
        $bisnis = Cache::remember("bisnis",60 * 60 * 24 * 7 , function(){
            return Bisnis::first();
        });
        return view("frontend.program.Bisnis",compact("bisnis","bisnisPhoto"));
    }
    public function industri()  {
        $industri = Cache::remember("industri", 60 * 0 * 24 * 7, function(){
            return Industri::first();
        });
        return view("frontend.program.industri",compact("industri"));
    }
    public function bursa()  {
        $bursa = Cache::remember("bursa", 60 * 60 * 24* 7, function(){
            return Bursa::first();
        });
        return view("frontend.program.bursa",compact("bursa"));
    }
    public function sija()  {
        $sija = Cache::remember("sija",60 * 60 * 24 * 7 , function(){
            return Sija::first();
        });
        return view("frontend.jurusan.sija",compact("sija"));
    }
    public function dkv()  {
        $dkv = Cache::remember("dkv",60 * 60 * 24 * 7 , function(){
            return Dkv::first();
        });
        return view("frontend.jurusan.dkv",compact("dkv"));
    }
    public function animasi()  {
        $animasi = Cache::remember("animasi",60 * 60 * 24 * 7 , function(){
            return Animasi::first();
        });
        return view("frontend.jurusan.animasi",compact("animasi"));
    }
    public function tkr()  {
        $tkr = Cache::remember("tkr",60 * 60 * 24 * 7 , function(){
            return Tkr::first();
        });
        return view("frontend.jurusan.tkr",compact("tkr"));
    }
    public function busana()  {
        $busana = Cache::remember("busana",60 * 60 * 24 * 7 , function(){
            return Busana::first();
        });
        return view("frontend.jurusan.busana",compact("busana"));
    }
    public function boga()  {
        $boga = Cache::remember("boga",60 * 60 * 24 * 7 , function(){
            return Boga::first();
        });
        return view("frontend.jurusan.boga",compact("boga"));
    }
    public function akuntansi()  {
        $akuntansi = Cache::remember("akuntansi",60 * 60 * 24 * 7 , function(){
            return Akuntansi::first();
        });
        return view("frontend.jurusan.akuntansi",compact("akuntansi"));
    }
    public function prestasi()  {
         $datas = Cache::remember('prestasis', 60, function () {
            return Prestasi::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $prestasis = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("frontend.kesiswaan.prestasi",compact("prestasis"));
    }
    public function ekstrakulikuler()  {
        $ekstraPhotos = Cache::remember('ekstraPhotos_get_all', 60 * 60 * 24 * 7, function () {
            return EkstraPhoto::latest()->get(); // seluruh data guru
        });


        $ekstrakulikuler = Cache::remember("ekstrakulikuler",60 * 60 * 24 * 7, function(){
            return Ekstrakulikuler::first();
        });
        return view("frontend.kesiswaan.ekstrakulikuler",compact("ekstrakulikuler","ekstraPhotos"));
    }
    public function osis()  {
        $osisPhotos = Cache::remember('osisPhotos_getAll', 60 * 69 * 24 * 7, function () {
            return OsisPhoto::latest()->get(); // seluruh data guru
        });


        $osis = Cache::remember("osis",60 * 60 * 24 * 7, function(){
            return Osis::first();
        });
        return view("frontend.kesiswaan.osis",compact("osis","osisPhotos"));
    }
    public function beasiswa()  {
        $beasiswa = Cache::remember("beasiswa",60 * 60 * 24 * 7 , function(){
            return Beasiswa::first();
        });
        return view("frontend.kesiswaan.beasiswa",compact("beasiswa"));
    }

    public function guru()  {
        $datas = Cache::remember('gurus', 60, function () {
            return Guru::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $gurus = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
         $kepsek = Cache::remember("kepsek",60 * 60 * 24 * 7 , function(){
            return Kepsek::first();
        });
        return view("frontend.informasi.guru",compact("gurus","kepsek"));
    }
    public function artikel()  {
        $artikels = Cache::remember("articles_get_6", 60 * 60 * 24 * 7 , function(){
            return Article::latest()->paginate(6);
        });
        $kategoris = Cache::remember("kategoris", 60 * 60 * 24 * 7 * 38 *6, function(){
            return Kategori::get();
        });
        return view("frontend.informasi.artikel",compact("artikels","kategoris"));
    }
    public function sarana()  {
        $sarana = Cache::remember("sarana",60 * 60 * 24 * 7 , function(){
            return Sarana::first();
        });
        return view("frontend.informasi.sarana",compact("sarana"));
    }
    public function galeri()  {
        $datas = Cache::remember('galeris', 60 * 60 * 24 * 7, function () {
            return Galeri::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $galeris = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("frontend.informasi.galeri",compact("galeris"));
    }
    public function drive()  {
        $datas = Cache::remember('drives', 60, function () {
            return Drive::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $drives = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("frontend.informasi.drive",compact("drives"));
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
        return redirect()->away("https://elearning.smkn1gedangan-malang.sch.id/login/index.php");

    }
    public function islamic()  {
        return redirect()->away("https://imamuslim.vercel.app");
    }

    public function save_masukan(Request $request)  {
        $request->validate([
            "email"=>"required|email",
            "nama"=>"required|string",
            "masukan"=>"required|string|min:5",
            'g-recaptcha-response' => 'required',
        ],[
            "masukan.required"=>"Masukan Wajib Diisi",
            "g-recapthca-response.required"=>"Captcha Wajib Di centang",
        ]);
        Masukan::create([
            "nama"=>$request->nama,
            "email"=>$request->email,
            "masukan"=>$request->masukan,
        ]);
        $url = "https://api.telegram.org/bot" .config("services.telegram.bot_token") ."/sendMessage";
        $params = [
            'chat_id' => config("services.telegram.chat_id"),
            'text' => "pesan dari " . e($request->email) . "\t pada ". Carbon::now() ."\t  ". $request->masukan,
        ];
        $client = new Client(['timeout' => 10]);
        try {
            $response = $client->postAsync($url, [
                'query' => $params,
            ])->wait();

            $data = json_decode($response->getBody(), true);
            } catch (\Exception $e) {
        Log::error("Telegram Error: " . $e->getMessage());
        return back()->with('error', 'Gagal mengirim pesan ke Telegram.');
}


        $data = json_decode($response->getBody(), true);

        $request->session()->put("captcha_validated",true);
        if (isset($data['ok']) && $data['ok']) {
            return redirect()->route("welcome")->with("success","pesan yang anda masukan telah disimpan ke database");
        } else {
            return back()->with('error', 'Gagal mengirim pesan ke Telegram.');
        }

    }

   public function readArticle($slug)  {
        $kategoris = Kategori::get();
        $articleTerbarus = Article::take(5)->latest()->get();
        $article = Article::where("slug",$slug)->first();

        if(!$article){
            abort(404,"artikel yang anda cari tidak ada di database");
        }
        return view("frontend.informasi.readArtikel",compact("article","kategoris","articleTerbarus"));
   }
}
