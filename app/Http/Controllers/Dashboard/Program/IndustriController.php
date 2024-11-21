<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\Industri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industri = Industri::first();
        return view("backend.programs.industri.index",compact("industri"));
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
        $industri = Industri::findOrFail(Crypt::decrypt($id));
        return view("backend.programs.industri.edit",compact("industri"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industri = Industri::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $industri->penulis_id = Auth::user()->id;
        $industri->konten = $data['konten'];
        $industri->save();
        return redirect()->route('industri.index')->with('success', 'Hubungan Industri berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
