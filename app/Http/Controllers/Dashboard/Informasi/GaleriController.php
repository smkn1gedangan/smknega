<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view("backend.informasis.galeri.index",compact("galeris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.informasis.galeri.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "judul"=> "min:6|max:100|required",
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $publicPath = public_path("img/galeri/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "galeri/" . $filename;

            // upload to public
            $file->move(public_path('img/galeri'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('galeri.create')->with('error', 'gambar gagal disimpan!');
            };
            $data["photo"] = $filename;
        }

        Galeri::create([
            "photo"=> $data["photo"],
            "judul"=> $request->judul,

        ]);
        return redirect()->route("galeri.index")->with('success', 'Data Galeri berhasil diupload dan disimpan!');

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
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        if($galeri){
            return view("backend.informasis.galeri.edit",compact("galeri"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "judul"=> "min:6|max:100|required",
        ]);
        if ($request->hasFile('photo')) {
            if ($galeri->photo) {
                $publicPath = public_path('img/galeri/' . $galeri->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."galeri/" . $galeri->photo; // Lokasi kedua (backup)

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
            $publicPath = public_path("img/galeri/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "galeri/" . $filename;

            // upload to public
            $file->move(public_path('img/galeri'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('galeri.index')->with('error', 'gambar gagal disimpan!');
            };

            $galeri->photo = $filename;


        }else{
            $galeri->judul = $data['judul'];
        }
            $galeri->save();
            return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        if ($galeri->photo) {
            $publicPath = public_path('img/galeri/' . $galeri->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."galeri/" . $galeri->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil dihapus!');
    }
}
