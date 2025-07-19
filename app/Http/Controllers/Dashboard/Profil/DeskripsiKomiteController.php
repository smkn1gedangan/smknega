<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\DeskripsiKomite;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class DeskripsiKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deskripsiKomite = Cache::remember("dKomite",60 * 60 * 24 * 7 , function(){
            return  DeskripsiKomite::first();
        });
        return view("backend.profils.deskripsiKomite.index",compact("deskripsiKomite"));
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
         $deskripsiKomite = Cache::remember("dKomite",60 * 60 * 24 * 7 , function() use($id){
            return  DeskripsiKomite::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.profils.deskripsiKomite.edit",compact("deskripsiKomite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deskripsiKomite = DeskripsiKomite::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
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
        ]);
        $deskripsiKomite->penulis_id = Auth::user()->id;
        $deskripsiKomite->konten = $purifier->purify($request->konten);;
        $deskripsiKomite->save();
        Cache::delete("dKomite");
        return redirect()->route('deskripsiKomite.index')->with('success', 'data Deskripsi Komite  berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
