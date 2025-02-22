<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\DeskripsiKomite;
use App\Models\Profil\KetuaKomite;
use App\Models\Profil\Komite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class KomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komites = Komite::latest()->paginate(10);
        $ketuaKomite = KetuaKomite::first();
        return view("backend.profils.Komite.index",compact("komites","ketuaKomite"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.profils.Komite.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            "jabatan"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {
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
                return redirect()->route('komite.create')->with('error', 'gambar gagal disimpan!');
            }
            $data["photo"] = $filename;
        }

        Komite::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "jabatan"=> $request->jabatan,

        ]);
        return redirect()->route("komite.index")->with('success', 'data Komite berhasil diupload dan disimpan!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $komite = Komite::findOrFail(Crypt::decrypt($id));
        if($komite){
            return view("backend.profils.Komite.edit",compact("komite"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komite = komite::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:5096',
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

            //backup
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
    }else{
        $komite->nama = $data['nama'];
        $komite->jabatan = $data['jabatan'];
    }
    $komite->save();
    return redirect()->route('komite.index')->with('success', 'Data Komite berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komite = Komite::findOrFail(Crypt::decrypt($id));
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
        $komite->delete();

        return redirect()->route('komite.index')->with('success', 'Data Komite berhasil dihapus!');

    }
    }

