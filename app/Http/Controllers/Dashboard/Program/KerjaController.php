<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\Kerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kerja = Kerja::first();
        return view("backend.kerja.index",compact("kerja"));
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
        $kerja = Kerja::findOrFail(Crypt::decrypt($id));
        return view("backend.kerja.edit",compact("kerja"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kerja = Kerja::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $kerja->penulis_id = Auth::user()->id;
        $kerja->konten = $data['konten'];
        $kerja->save();
        return redirect()->route('kerja.index')->with('success', 'program kerja berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
