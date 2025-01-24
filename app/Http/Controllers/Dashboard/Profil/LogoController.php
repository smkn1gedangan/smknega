<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Logo;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        return view("backend.profils.Logo.index",compact("logo"));
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
        $logo = Logo::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.Logo.edit",compact("logo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logo = Logo::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $request->validate([
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
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            if ($logo->photo) {
                $publicPath = public_path('img/profil/' . $logo->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."profil/" . $logo->photo; // Lokasi kedua (backup)

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

            $publicPath = public_path("img/profil/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "profil/" . $filename;

            // upload to public
            $file->move(public_path('img/profil'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('logo.index')->with('error', 'gambar gagal disimpan!');
            }
            $logo->photo = $filename;
            $logo->konten = $purifier->purify($request->konten);;
            $logo->penulis_id = Auth::user()->id;
        }else{
            $logo->konten = $purifier->purify($request->konten);;
            $logo->penulis_id = Auth::user()->id;
        }

        // simpan
        $logo->save();
    return redirect()->route('logo.index')->with('success', 'data Logo berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
