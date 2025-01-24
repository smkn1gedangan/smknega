<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\StrukturOrganisasi;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktur = StrukturOrganisasi::first();
        return view("backend.profils.struktur.index",compact("struktur"));
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
        $struktur = StrukturOrganisasi::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.struktur.edit",compact("struktur"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $struktur = StrukturOrganisasi::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,jpeg',
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
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            if ($struktur->photo) {
                $publicPath = public_path('img/profil/' . $struktur->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."profil/" . $struktur->photo; // Lokasi kedua (backup)

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
            $publicPath = public_path("img/profil/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "profil/" . $filename;

            // upload to public
            $file->move(public_path('img/profil'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('struktur.index')->with('error', 'gambar gagal disimpan!');
            }

            $struktur->photo = $filename;
            $struktur->konten = $purifier->purify($request->konten);;
            $struktur->penulis_id = Auth::user()->id;
        }else{
            $struktur->konten = $purifier->purify($request->konten);;
            $struktur->penulis_id = Auth::user()->id;
        }
    $struktur->save();
            return redirect()->route('struktur.index')->with('success', 'data Struktur Organisasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
