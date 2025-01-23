<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Boga;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BogaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boga = Boga::first();
        return view("backend.jurusan.boga.index",compact("boga"));
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
        $boga = Boga::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.boga.edit",compact("boga"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $boga = Boga::findOrFail(Crypt::decrypt($id));
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
                $deleteFile("img/jurusan/" . $boga->photo);

                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/jurusan'), $filename);

                $boga->photo = $filename;
            }
            if ($request->hasFile('photo_kaprog')) {
                $deleteFile("img/jurusan/" . $boga->photo_kaprog);

                $file = $request->file('photo_kaprog');
                $filenameKaprog = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/jurusan'), $filenameKaprog);

                $boga->photo_kaprog = $filenameKaprog;

            }
            $boga->konten =$purifier->purify($request->konten);
            $boga->judul = $data['judul'];
            $boga->penulis_id = Auth::user()->id;
            $boga->nama_kaprog = $data['nama_kaprog'];
            $boga->ket_kaprog = $data['ket_kaprog'];
            $boga->save();
            return redirect()->route('boga.index')->with('success', 'data Jurusn Tata Boga berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
