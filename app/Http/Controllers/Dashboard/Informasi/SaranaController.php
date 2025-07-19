<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sarana = Cache::remember("sarana",60 * 60 * 24 * 7 , function(){
            return Sarana::first();
        });
        return view("backend.informasis.sarana.index",compact("sarana"));
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
        $sarana = Cache::remember("sarana",60 * 60 * 24 * 7 , function()use($id){
            return Sarana::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.informasis.sarana.edit",compact("sarana"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sarana = Sarana::findOrFail(Crypt::decrypt($id));
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
        $sarana->penulis_id = Auth::user()->id;
        $sarana->konten = $purifier->purify($request->konten);
        $sarana->save();
        Cache::delete("sarana");
        return redirect()->route('sarana.index')->with('success', 'data Sarana Prasarana berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
