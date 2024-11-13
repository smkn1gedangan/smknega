<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potensi = Potensi::first();
        return view("backend.potensi.index",compact("potensi"));
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
        $potensi = Potensi::findOrFail(Crypt::decrypt($id));
        return view("backend.potensi.edit",compact("potensi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $potensi = Potensi::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $potensi->penulis_id = Auth::user()->id;
        $potensi->konten = $data['konten'];
        $potensi->save();
        return redirect()->route('potensi.index')->with('success', 'Potensi Unggulan berhasil diperbarui!');

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
