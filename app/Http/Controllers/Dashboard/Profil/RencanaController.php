<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Rencana;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rencana = Rencana::first();
        return view("backend.profils.rencana.index",compact("rencana"));
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
        $rencana = Rencana::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.rencana.edit",compact("rencana"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rencana = Rencana::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
            "penulis_id"=> "required",
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
        $rencana->penulis_id = Auth::user()->id;
        $rencana->konten =$purifier->purify($request->konten);;
        $rencana->save();
        return redirect()->route('rencana.index')->with('success', 'data Rencana Unggulan berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
