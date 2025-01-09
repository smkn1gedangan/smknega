<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Animasi;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class AnimasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animasi = Animasi::first();
        return view("backend.jurusan.animasi.index",compact("animasi"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animasi = Animasi::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.animasi.edit",compact("animasi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animasi = Animasi::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:2048',
            'konten' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('Konten harus memiliki minimal 20 kata..');

                    }
                },
            ],
            "judul"=> "min:3|max:100|required",
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/jurusan/" . $animasi->photo;
            if ($animasi->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filename);

            $animasi->photo = $filename;
            $animasi->konten = $purifier->purify($request->konten);
            $animasi->judul = $data['judul'];
            $animasi->penulis_id = Auth::user()->id;
            $animasi->save();
            return redirect()->route('animasi.index')->with('success', 'data Jurusan Animasi berhasil diperbarui!');
    }else{
            $animasi->konten = $purifier->purify($request->konten);
            $animasi->judul = $data['judul'];
            $animasi->penulis_id = Auth::user()->id;
    }
    $animasi->save();
    return redirect()->route('animasi.index')->with('success', 'data Jurusan Animasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
