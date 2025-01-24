<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index()  {
        $profil = Profil::first();
        return view("backend.welcomes.profil.index",compact("profil"));
    }
    public function edit(string $id)
    {
        $profil = Profil::findOrFail(Crypt::decrypt($id));
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
                $publicPath = public_path('img/welcome/' . $profil->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."welcome/" . $profil->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists($publicPath)) {
                    File::delete($publicPath);
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $publicPath = public_path("img/welcome/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "welcome/" . $filename;

            // upload to public
            $file->move(public_path('img/welcome'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('profil.index')->with('error', 'gambar gagal disimpan!');
            };


            $profil->konten = $purifier->purify($request->konten);
            $profil->photo = $filename;
        }else{
            $profil->konten = $purifier->purify($request->konten);
        }

    $profil->save();

    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
}
}
