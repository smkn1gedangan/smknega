<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view("backend.artikel.index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::get();
        return view("backend.artikel.create",compact("kategoris"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "title"=> "min:6|max:100|required",
            "writer_id"=> "required",
            "text_content"=> "min:10|required",
            "kategori_id" => "required|array"
        ]);

        $currentDateTime = Carbon::now()->format('Y-m-d-H-i-s');
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/articles_images'), $filename);
            $data["image"] = $filename;
        }

        $article = Article::create([
            "image"=> $data["image"],
            "title"=> $request->title,
            "text_content"=> $request->text_content,
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
        return view("backend.artikel.show",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        return view("backend.artikel.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "title"=> "min:6|max:100|required",
            "writer_id"=> "required",
            "text_content"=> "min:10|required",
        ]);
        if ($request->hasFile('image')) {
            $path = "img/articles_images/" . $article->image;
            if ($article->image && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/articles_images'), $filename);

            $article->image = $filename;
            $article->title = $data['title'];
            $article->writer_id = Auth::user()->id;
            $article->text_content = $data['text_content'];
            $article->save();

            return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        if ($article->image) {
            $imagePath = public_path('img/articles_images/' . $article->image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $article->delete();

        return redirect()->route('artikel.index')->with('success', 'Data Artikel berhasil dihapus!');
    }
}
