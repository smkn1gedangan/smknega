<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Logo;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Cache::remember("logos",60 * 60 * 24 * 7,function(){
            return Logo::first();
        });
        return view("backend.profils.Logo.index",compact("logo"));
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
        $logo = Cache::remember("logos",60 * 60 * 24 * 7,function()use($id){
            return Logo::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.profils.Logo.edit",compact("logo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logo = Logo::findOrFail(Crypt::decrypt($id));
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
             if ($logo->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $logo->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$logo->photo))) {
                    File::delete(storage_path("app/public/".$logo->photo));
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
            $logo->photo = $sourcePath;
        }
        $logo->konten = $purifier->purify($request->konten);;
        $logo->penulis_id = Auth::user()->id;

        // simpan
        $logo->save();
        Cache::delete("logos");
        return redirect()->route('logo.index')->with('success', 'data Logo berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
