<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Dkv;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class DkvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dkv = Cache::remember("dkv",60 * 60 * 24 * 7 , function(){
            return Dkv::first();
        });
        return view("backend.jurusan.dkv.index",compact("dkv"));
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
        $dkv = Dkv::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.dkv.edit",compact("dkv"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dkv = Dkv::findOrFail(Crypt::decrypt($id));
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
        ]);
        $deleteFile = function($filePath){
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        };
        if ($request->hasFile('photo')) {
            $deleteFile(storage_path("app/public/". $dkv->photo));
            $deleteFile(env("BACKUP_PHOTOS") . $dkv->photo); // Lokasi kedua (backup)

            $sourcePath = $request->file("photo")->store("jurusan","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;


            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $dkv->photo = $sourcePath;
        }
        if ($request->hasFile('photo_kaprog')) {
            $deleteFile(storage_path("app/public/". $dkv->photo_kaprog));
            $deleteFile(env("BACKUP_PHOTOS") . $dkv->photo_kaprog); // Lokasi kedua (backup)

            $sourcePath = $request->file("photo_kaprog")->store("jurusan","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;
            

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };

            $dkv->photo_kaprog = $sourcePath;

        }
        $dkv->konten =$purifier->purify($request->konten);
        $dkv->judul = $data['judul'];
        $dkv->penulis_id = Auth::user()->id;
        $dkv->nama_kaprog = $data['nama_kaprog'];
        $dkv->ket_kaprog = $data['ket_kaprog'];
        $dkv->save();
        Cache::delete("dkv");
        return redirect()->route('dkv.index')->with('success', 'data Jurusan Dkv berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
