<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\Beasiswa;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $beasiswa = Cache::remember("beasiswa",60 * 60 * 24 * 7 , function(){
            return Beasiswa::first();
        });
        return view("backend.kesiswaans.beasiswa.index",compact("beasiswa"));
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
        $beasiswa = Cache::remember("beasiswa",60 * 60 * 24 * 7 , function() use($id){
            return Beasiswa::findOrFail(Crypt::decrypt($id));
        });
        return view("backend.kesiswaans.beasiswa.edit",compact("beasiswa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beasiswa = Beasiswa::findOrFail(Crypt::decrypt($id));
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
        $beasiswa->penulis_id = Auth::user()->id;
        $beasiswa->konten = $purifier->purify($request->konten);
        $beasiswa->save();
        Cache::delete("beasiswa");
        return redirect()->route('beasiswa.index')->with('success', 'data Beasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
