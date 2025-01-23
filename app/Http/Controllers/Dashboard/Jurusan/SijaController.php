<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Sija;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class SijaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sija = Sija::first();
        return view("backend.jurusan.sija.index",compact("sija"));
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
        $sija = Sija::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.sija.edit",compact("sija"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sija = Sija::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
           'photo_kaprog' => 'file|mimes:jpg,png,jpeg|max:5096',
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
            "judul"=> "min:3|max:100|required",
            "nama_kaprog"=> "min:3|max:100|required",
            "ket_kaprog"=> "min:3|max:100|required",
            "penulis_id"=> "required"
        ]);
        $deleteFile = function($filePath){
            if($filePath && File::exists(public_path($filePath))){
                File::delete(public_path($filePath));
            }
        };
        if ($request->hasFile('photo')) {
            $deleteFile("img/jurusan/" . $sija->photo);

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filename);

            $sija->photo = $filename;
        }
        if ($request->hasFile('photo_kaprog')) {
            $deleteFile("img/jurusan/" . $sija->photo_kaprog);

            $file = $request->file('photo_kaprog');
            $filenameKaprog = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filenameKaprog);

            $sija->photo_kaprog = $filenameKaprog;

        }
        $sija->konten =$purifier->purify($request->konten);
        $sija->judul = $data['judul'];
        $sija->penulis_id = Auth::user()->id;
        $sija->nama_kaprog = $data['nama_kaprog'];
        $sija->ket_kaprog = $data['ket_kaprog'];
        $sija->save();
        return redirect()->route('sija.index')->with('success', 'data Jurusan Sija berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
