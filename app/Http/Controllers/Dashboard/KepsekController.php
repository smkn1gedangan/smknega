<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
class KepsekController extends Controller
{
    public function index()  {
        $kepsek = Cache::remember("kepsek",60* 60* 24 * 7,function(){
            return Kepsek::latest()->first();
        });
        return view("backend.welcomes.kepsek.index",compact("kepsek"));
    }
    public function edit(string $id)
    {
        $kepsek = Cache::remember("kepsek",60* 60* 24 * 7,function()use($id){
            return Kepsek::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.welcomes.kepsek.edit",compact("kepsek"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kepsek = Kepsek::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
            'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            'sambutan' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('sambutan tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('sambutan harus memiliki minimal 20 kata..');

                    }
                },
            ],
        ]);
        if ($request->hasFile('photo')) {
           if ($kepsek->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $kepsek->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $kepsek->photo))) {
                    File::delete(storage_path("app/public/". $kepsek->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }
            $sourcePath = $request->file("photo")->store("kepala_sekolah","public");
            $backupPath = env("BACKUP_PHOTOS") . "kepala_sekolah/" . $sourcePath;

            // upload to public
            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->route('kepsek.index')->with('error', 'gambar gagal disimpan!');
            };


            $kepsek->photo = $sourcePath;
        }
        $kepsek->nama = $data['nama'];
        $kepsek->sambutan = $purifier->purify($request->sambutan);
        $kepsek->save();
        Cache::delete("kepsek");
        return redirect()->route('kepsek.index')->with('success', 'data kepala sekolah berhasil diperbarui!');
}
}
