<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = VisiMisi::first();
        return view("backend.visi.index",compact("visi"));
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
        $visi = VisiMisi::findOrFail(Crypt::decrypt($id));
        return view("backend.visi.edit",compact("visi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visi = VisiMisi::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $visi->penulis_id = Auth::user()->id;
        $visi->konten = $data['konten'];
        $visi->save();
        return redirect()->route('visi.index')->with('success', 'visi misi berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
