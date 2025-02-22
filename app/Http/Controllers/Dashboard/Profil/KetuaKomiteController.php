<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\KetuaKomite;
use Illuminate\Http\Request;
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
                $publicPath = public_path('img/komite/' . $komite->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."komite/" . $komite->photo; // Lokasi kedua (backup)

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

            $publicPath = public_path("img/komite/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "komite/" . $filename;

            // upload to public
            $file->move(public_path('img/komite'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('komite.index')->with('error', 'gambar gagal disimpan!');
            }
            $komite->photo = $filename;
            $komite->nama = $data['nama'];
            $komite->jabatan = $data['jabatan'];
        }else{
            $komite->nama = $data['nama'];
            $komite->jabatan = $data['jabatan'];
        }
        // simpan
        $komite->save();
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
