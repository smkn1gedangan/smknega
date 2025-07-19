<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Akuntansi;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class AkuntansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akuntansi = Cache::remember("akuntansi",60 * 60 * 24 * 7 , function(){
            return Akuntansi::first();
        });
        return view("backend.jurusan.akuntansi.index",compact("akuntansi"));
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
        $akuntansi = Akuntansi::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.akuntansi.edit",compact("akuntansi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $akuntansi = Akuntansi::findOrFail(Crypt::decrypt($id));
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

        // jurusan
        if ($request->hasFile('photo')) {
            $deleteFile(storage_path("app/public/". $akuntansi->photo));
            $deleteFile(env("BACKUP_PHOTOS") . $akuntansi->photo); // Lokasi kedua (backup)

            $sourcePath = $request->file("photo")->store("jurusan","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;


            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $akuntansi->photo = $sourcePath;
        }
        // kaprog
        if ($request->hasFile('photo_kaprog')) {
            $deleteFile(storage_path("app/public/". $akuntansi->photo_kaprog));
            $deleteFile(env("BACKUP_PHOTOS") . $akuntansi->photo_kaprog); // Lokasi kedua (backup)

            $sourcePath = $request->file("photo_kaprog")->store("jurusan","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;
            

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };

            $akuntansi->photo_kaprog = $sourcePath;

        }
        $akuntansi->konten =$purifier->purify($request->konten);
        $akuntansi->judul = $data['judul'];
        $akuntansi->penulis_id = Auth::user()->id;
        $akuntansi->nama_kaprog = $data['nama_kaprog'];
        $akuntansi->ket_kaprog = $data['ket_kaprog'];
        $akuntansi->save();
        Cache::delete("akuntansi");
        return redirect()->route('akuntansi.index')->with('success', 'data Jurusan Akuntansi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
