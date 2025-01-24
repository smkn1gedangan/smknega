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
           'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
           'photo_kaprog' => 'file|mimes:jpg,png,jpeg|max:5096',
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
            "nama_kaprog"=> "min:3|max:100|required",
            "ket_kaprog"=> "min:3|max:100|required",
            "penulis_id"=> "required"
        ]);
        $deleteFile = function($filePath){
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        };
        if ($request->hasFile('photo')) {
            $deleteFile("img/jurusan/" . $animasi->photo);
            $deleteFile(env("BACKUP_PHOTOS") ."jurusan/" . $animasi->photo); // Lokasi kedua (backup)
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $publicPath = public_path("img/jurusan/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "jurusan/" . $filename;

            // upload to public
            $file->move(public_path('img/jurusan'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('animasi.index')->with('error', 'gambar gagal disimpan!');
            };

            $animasi->photo = $filename;
        }
        if ($request->hasFile('photo_kaprog')) {
            $deleteFile("img/jurusan/" . $animasi->photo_kaprog);
            $deleteFile(env("BACKUP_PHOTOS") ."jurusan/" . $animasi->photo_kaprog); // Lokasi kedua (backup)
            $file = $request->file('photo_kaprog');
            $filenameKaprog = time() . '_' . $file->getClientOriginalName();
            $publicPath = public_path("img/jurusan/" . $filenameKaprog);
            $backupPath = env("BACKUP_PHOTOS") . "jurusan/" . $filenameKaprog;

            // upload to public
            $file->move(public_path('img/jurusan'), $filenameKaprog);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('animasi.index')->with('error', 'gambar gagal disimpan!');
            };

            $animasi->photo_kaprog = $filenameKaprog;

        }
        $animasi->konten =$purifier->purify($request->konten);
        $animasi->judul = $data['judul'];
        $animasi->penulis_id = Auth::user()->id;
        $animasi->nama_kaprog = $data['nama_kaprog'];
        $animasi->ket_kaprog = $data['ket_kaprog'];
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
