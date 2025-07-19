<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Sejarah;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarah = Cache::remember("sejarah",60 * 60 * 24 * 7,function(){
            return Sejarah::first();
        });
        return view("backend.profils.sejarah.index",compact("sejarah"));
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
         $sejarah = Cache::remember("sejarah",60 * 60 * 24 * 7,function()use($id){
            return  Sejarah::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.profils.sejarah.edit",compact("sejarah"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sejarah = Sejarah::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $request->validate([
            'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
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
        ]);
        if ($request->hasFile('photo')) {
            if ($sejarah->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $sejarah->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$sejarah->photo))) {
                    File::delete(storage_path("app/public/".$sejarah->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $sourcePath = $request->file("photo")->store("profil","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;

            // Simpan ke folder public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            }
            $sejarah->photo = $sourcePath;
        }

        $sejarah->penulis_id = Auth::user()->id;
        $sejarah->konten = $purifier->purify($request->konten);
        // simpan
        $sejarah->save();

        Cache::delete("sejarah");
        return redirect()->route('sejarah.index')->with('success', 'data sejarah berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
