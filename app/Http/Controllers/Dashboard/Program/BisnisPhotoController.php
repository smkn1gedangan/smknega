<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\BisnisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BisnisPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.programs.bisnis.createPhoto");
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


            $sourcePath = $request->file("photo")->store("bisnis","public");
            $backupPath = env("BACKUP_PHOTOS") . "bisnis/" . $sourcePath;

            // upload to public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->route('bisnisPhoto.create')->with('error', 'gambar gagal disimpan!');
            };

            BisnisPhoto::create(["photo"=>$sourcePath]);
            Cache::delete("bisnisPhotos");
            Cache::delete("bisnisPhotos_getAll");
            return redirect()->route('bisnis.index')->with('success', 'Data Photo berhasil ditambah dan disimpan!');
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
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        if($bisnis){
            return view("backend.programs.bisnis.editPhoto",compact("bisnis"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            if ($bisnis->photo) {
                $publicPath = public_path('img/bisnis/' . $bisnis->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."bisnis/" . $bisnis->photo; // Lokasi kedua (backup)

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

            $publicPath = public_path("img/bisnis/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "bisnis/" . $filename;

            // upload to public
            $file->move(public_path('img/bisnis'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('bisnisPhoto.index')->with('error', 'gambar gagal disimpan!');
            };

            $bisnis->photo = $filename;
            $bisnis->save();

            return redirect()->route('bisnis.index')->with('success', 'Data Photo berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        if ($bisnis->photo) {
            $backupPath = env("BACKUP_PHOTOS") ."bisnis/" . $bisnis->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists(storage_path("app/public/".$bisnis->photo))) {
                File::delete(storage_path("app/public/".$bisnis->photo));
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $bisnis->delete();
        Cache::delete("bisnisPhotos_getAll");
        Cache::delete("bisnisPhotos");
        return redirect()->route('bisnis.index')->with('success', 'Data bisnis berhasil dihapus!');

    }
}
