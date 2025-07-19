<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\KetuaKomite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class KetuaKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $ketuaKomite = KetuaKomite::findOrFail(Crypt::decrypt($id));
        if($ketuaKomite){
            return view("backend.profils.Komite.editKomite",compact("ketuaKomite"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komite = KetuaKomite::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            "jabatan"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
             if ($komite->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $komite->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$komite->photo))) {
                    File::delete(storage_path("app/public/".$komite->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $sourcePath = $request->file("photo")->store("komite","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;

            // Simpan ke folder public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            }
            $komite->photo = $sourcePath;
        }
        $komite->nama = $data['nama'];
        $komite->jabatan = $data['jabatan'];
        
        // simpan
        $komite->save();
        Cache::delete("ketuaKomite");
        return redirect()->route('komite.index')->with('success', 'data Ketua Komite berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
