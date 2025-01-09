<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Busana;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BusanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busana = Busana::first();
        return view("backend.jurusan.busana.index",compact("busana"));
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
        $busana = busana::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.busana.edit",compact("busana"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $busana = Busana::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:2048',
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
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/jurusan/" . $busana->photo;
            if ($busana->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filename);

            $busana->photo = $filename;
            $busana->konten = $purifier->purify($request->konten);
            $busana->judul = $data['judul'];
            $busana->penulis_id = Auth::user()->id;
            $busana->save();
            return redirect()->route('busana.index')->with('success', 'data Jurusn Tata Busana berhasil diperbarui!');
    }else{
            $busana->konten = $purifier->purify($request->konten);
            $busana->judul = $data['judul'];
            $busana->penulis_id = Auth::user()->id;
    }
    $busana->save();
    return redirect()->route('busana.index')->with('success', 'data Jurusn Tata Busana berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
