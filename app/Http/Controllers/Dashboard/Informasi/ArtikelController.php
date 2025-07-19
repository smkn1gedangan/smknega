<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Kategori;
use Carbon\Carbon;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $kategoris = $request->input("kategori_id",[1,2,3,4,5,6]);
        $articles = Article::query()->with(["kategoris"])
            ->when($request->input("judul"), function ($query) use($request) {
                $query->where('title', 'like', '%' . $request->input("judul") . '%');
            })
            ->when(count($kategoris) >= 1, function ($query) use ($kategoris) {
                $query->whereHas("kategoris", function ($query) use ($kategoris) {
                    $query->whereIn("kategori_id", $kategoris);
                });
            })
            ->latest()
            ->paginate(10);

        $kategoris = Kategori::get();
        $judul = $request->input("title");
        return view("backend.informasis.artikel.index",compact("articles","judul","kategoris"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::get();
        return view("backend.informasis.artikel.create",compact("kategoris"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
            'image' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "title"=> "min:6|max:100|required",
            'text_content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('Konten harus memiliki minimal 20 kata..');

                    }
                },
            ],
            "kategori_id" => "required|array"
        ]);

        $currentDateTime = Carbon::now()->format('Y-m-d-H-i-s');
        if ($request->hasFile('image')) {
            $sourcePath = $request->file("image")->store("articles_images","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;

            // upload to public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/". $sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };

            $data["image"] = $sourcePath;
        }

        $article = Article::create([
            "write_id"=> Auth::user()->id,
            "image"=> $data["image"],
            "title"=> $request->title,
            "text_content"=> $purifier->purify($request->text_content),
            "writer_id"=> Auth::user()->id,
            "slug"=> strtolower(str_replace(' ', '-', $request->title)) . '-' . $currentDateTime

        ]);
        $article->kategoris()->sync($data["kategori_id"]);
        Cache::delete("articles_by_prestasis_take_5");
        Cache::delete("articles_by_not_prestatis_take_5");
        Cache::delete("articles_get_6");
        return redirect()->route("artikel.index")->with('success', 'Artikel berhasil diupload dan disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with("kategoris")->findOrFail(Crypt::decrypt($id));
        return view("backend.informasis.artikel.show",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::get();
        $article = Article::findOrFail(Crypt::decrypt($id));
        return view("backend.informasis.artikel.edit",compact("article","kategoris"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::with("kategoris")->findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'image' => 'file|mimes:jpg,png,jpeg|max:5096',
            "title"=> "min:6|max:100|required",
            'text_content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('Konten harus memiliki minimal 20 kata..');

                    }
                },
            ],
            "kategori_id" => "required|array"
        ]);
        
        if ($request->hasFile('image')) {
            if ($article->image) {
                $backupPath = env("BACKUP_PHOTOS") . $article->image; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $article->image))) {
                    File::delete(storage_path("app/public/". $article->image));
                }
                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

             $sourcePath = $request->file("image")->store("articles_images","public");
                $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;

                // upload to public

                if (!file_exists(dirname($backupPath))) {
                    mkdir(dirname($backupPath), 0777, true);
                }
                // Simpan juga ke folder backup
                if(!copy(storage_path("app/public/". $sourcePath), $backupPath)){
                    return redirect()->back()->with('error', 'gambar gagal disimpan!');
                };

            $article->image = $sourcePath;
        }
        $article->title = $data['title'];
        $article->writer_id = Auth::user()->id;
        $article->text_content = $purifier->purify($data["text_content"]);
        $article->save();
        $article->kategoris()->sync($data["kategori_id"]);
        Cache::delete("articles_by_prestasis_take_5");
        Cache::delete("articles_by_not_prestatis_take_5");
        Cache::delete("articles_get_6");
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        if ($article->image) {
                $backupPath = env("BACKUP_PHOTOS") . $article->image; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $article->image))) {
                    File::delete(storage_path("app/public/". $article->image));
                }
                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }
        $article->delete();
        Cache::delete("articles_by_prestasis_take_5");
        Cache::delete("articles_by_not_prestatis_take_5");
        Cache::delete("articles_get_6");
        return redirect()->route('artikel.index')->with('success', 'Data Artikel berhasil dihapus!');
    }
}
