<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\EkstraPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class EkstraPhotoController extends Controller
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
        return view("backend.kesiswaans.ekstrakulikuler.createPhoto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
         ]);
         if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();


            $publicPath = public_path("img/ekstra/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "ekstra/" . $filename;

            // upload to public
            $file->move(public_path('img/ekstra'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('ekstraPhoto.create')->with('error', 'gambar gagal disimpan!');
            };
            EkstraPhoto::create(["photo"=>$filename]);

            return redirect()->route('ekstrakulikuler.index')->with('success', 'Photo ekstrakulikuler berhasil ditambah dan disimpan!');
         }
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
        $ekstraPhoto = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        if($ekstraPhoto){
            return view("backend.kesiswaans.ekstrakulikuler.editPhoto",compact("ekstraPhoto"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ekstra = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        $request->validate([
           'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
        ]);
        if ($request->hasFile('photo')) {
            if ($ekstra->photo) {
                $publicPath = public_path('img/ekstra/' . $ekstra->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."ekstra/" . $ekstra->photo; // Lokasi kedua (backup)

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
            $publicPath = public_path("img/ekstra/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "ekstra/" . $filename;

            // upload to public
            $file->move(public_path('img/ekstra'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('ekstrakulikuler.index')->with('error', 'gambar gagal disimpan!');
            };


            $ekstra->photo = $filename;
            $ekstra->save();

            return redirect()->route('ekstrakulikuler.index')->with('success', 'Data Photo Ekstrakulikuler berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekstra = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        if ($ekstra->photo) {
            $publicPath = public_path('img/ekstra/' . $ekstra->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."ekstra/" . $ekstra->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $ekstra->delete();

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data Photo Ekstrakulikuler berhasil dihapus!');
}
}
