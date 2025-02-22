<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\OsisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class OsisPhotoController extends Controller
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
        return view("backend.kesiswaans.osis.createPhoto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:3|max:100|required",
            "jabatan"=> "min:3|required",
         ]);
         if ($request->hasFile('photo')) {

             $file = $request->file('photo');
             $filename = time() . '_' . $file->getClientOriginalName();

             $publicPath = public_path("img/osis/" . $filename);
             $backupPath = env("BACKUP_PHOTOS") . "osis/" . $filename;

             // upload to public
             $file->move(public_path('img/osis'), $filename);

             if (!file_exists(dirname($backupPath))) {
                 mkdir(dirname($backupPath), 0777, true);
             }
             // Simpan juga ke folder backup
             if(!copy($publicPath, $backupPath)){
                 return redirect()->route('osisPhoto.create')->with('error', 'gambar gagal disimpan!');
             };


             OsisPhoto::create([
                "photo"=>$filename,
                "nama"=> $request->nama,
                "jabatan"=> $request->jabatan
            ]);

             return redirect()->route('osis.index')->with('success', 'Osis berhasil ditambah dan disimpan!');
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
        $osisPhoto = OsisPhoto::findOrFail(Crypt::decrypt($id));
        if($osisPhoto){
            return view("backend.kesiswaans.osis.editPhoto",compact("osisPhoto"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $osis = OsisPhoto::findOrFail(Crypt::decrypt($id));
        $request->validate([
           'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
           "nama"=> "min:3|max:100|required",
           "jabatan"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            if ($osis->photo) {
                $publicPath = public_path('img/osis/' . $osis->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."osis/" . $osis->photo; // Lokasi kedua (backup)

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
            $publicPath = public_path("img/osis/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "osis/" . $filename;

            // upload to public
            $file->move(public_path('img/osis'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('osis.edit')->with('error', 'gambar gagal disimpan!');
            };


            $osis->photo = $filename;
            $osis->nama = $request->nama;
            $osis->jabatan = $request->jabatan;
        }else{
            $osis->nama = $request->nama;
            $osis->jabatan = $request->jabatan;
        }
        $osis->save();

        return redirect()->route('osis.index')->with('success', 'Data Osis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $osis = OsisPhoto::findOrFail(Crypt::decrypt($id));
        if ($osis->photo) {
            $publicPath = public_path('img/osis/' . $osis->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."osis/" . $osis->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $osis->delete();

        return redirect()->route('osis.index')->with('success', 'Data Osis berhasil dihapus!');
    }
}
