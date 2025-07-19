<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index()  {
        $profil = Cache::remember("profil",60 * 60* 24 * 7,function(){
            return Profil::first();
        });
        return view("backend.welcomes.profil.index",compact("profil"));
    }
    public function edit(string $id)
    {
        $profil = Cache::remember("profil",60 * 60* 24 * 7,function() use($id){
            return Profil::findOrFail(Crypt::decrypt($id));;
        });
        if($profil){
            return view("backend.welcomes.profil.edit",compact("profil"));
        }
    }

    public function update(Request $request, string $id)  {
        $profil = Profil::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        $data = $request->validate([
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
            if ($profil->photo) {
                $backupPath = env("BACKUP_PHOTOS") ."welcome/" . $profil->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $profil->photo))) {
                    File::delete(storage_path("app/public/". $profil->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $sourcePath = $request->file("photo")->store("welcome","public");
            $backupPath = env("BACKUP_PHOTOS") . "welcome/" . $sourcePath;

            // upload to public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->route('profil.index')->with('error', 'gambar gagal disimpan!');
            };


            $profil->photo = $sourcePath;
        }
        $profil->konten = $purifier->purify($request->konten);

        $profil->save();
        Cache::delete("profil");
    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
}
}
