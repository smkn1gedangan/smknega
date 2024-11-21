<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\DeskripsiKomite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DeskripsiKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deskripsiKomite = DeskripsiKomite::first();
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
        $deskripsiKomite = DeskripsiKomite::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.deskripsiKomite.edit",compact("deskripsiKomite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deskripsiKomite = DeskripsiKomite::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $deskripsiKomite->penulis_id = Auth::user()->id;
        $deskripsiKomite->konten = $data['konten'];
        $deskripsiKomite->save();
        return redirect()->route('deskripsiKomite.index')->with('success', 'deskripsi Komite  berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
