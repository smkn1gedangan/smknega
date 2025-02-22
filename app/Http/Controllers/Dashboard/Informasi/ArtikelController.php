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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $judul = $request->input("title");
        $kategoris = $request->input("kategori_id",[1,2,3,4,5,6]);
        $articles = Article::query()
            ->when($judul, function ($query, $judul) {
                $query->where('title', 'like', '%' . $judul . '%');
            })
            ->when(count($kategoris) >= 1, function ($query) use ($kategoris) {
                $query->whereHas("kategoris", function ($query) use ($kategoris) {
                    $query->whereIn("kategori_id", $kategoris);
                });
            })
            ->latest()
            ->paginate(10);

        $kategoris = Kategori::get();
        return view("backend.informasis.artikel.index",compact("articles","kategoris"));
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
            "writer_id"=> "required",
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
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $publicPath = public_path("img/articles_images/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "articles_images/" . $filename;

            // upload to public
            $file->move(public_path('img/articles_images'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('artikel.create')->with('error', 'gambar gagal disimpan!');
            };

            $data["image"] = $filename;
        }

        $article = Article::create([
            "image"=> $data["image"],
            "title"=> $request->title,
            "text_content"=> $purifier->purify($request->text_content),
            "writer_id"=> Auth::user()->id,
            "slug"=> strtolower(str_replace(' ', '-', $request->title)) . '-' . $currentDateTime

        ]);
        $article->kategoris()->sync($data["kategori_id"]);
        return redirect()->route("artikel.index")->with('success', 'Article berhasil diupload dan disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
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
        $article = Article::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'image' => 'file|mimes:jpg,png,jpeg|max:5096',
            "title"=> "min:6|max:100|required",
            "writer_id"=> "required",
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
                $publicPath = public_path('img/articles_images/' . $article->image); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."articles_images/" . $article->image; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists($publicPath)) {
                    File::delete($publicPath);
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $publicPath = public_path("img/articles_images/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "articles_images/" . $filename;

            // upload to public
            $file->move(public_path('img/articles_images'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('artikel.index')->with('error', 'gambar gagal disimpan!');
            };

            $article->image = $filename;
        }else{
            $article->title = $data['title'];
            $article->writer_id = Auth::user()->id;
            $article->text_content = $purifier->purify($data["text_content"]);
        }
        $article->save();
        $article->kategoris()->sync($data["kategori_id"]);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        if ($article->photo) {
            $publicPath = public_path('img/articles_images/' . $article->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."articles_images/" . $article->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $article->delete();

        return redirect()->route('artikel.index')->with('success', 'Data Artikel berhasil dihapus!');
    }
}
