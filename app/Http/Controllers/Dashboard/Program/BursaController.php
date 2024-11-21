<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\Bursa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BursaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bursa = Bursa::first();
        return view("backend.programs.bursa.index",compact("bursa"));
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
        $bursa = Bursa::findOrFail(Crypt::decrypt($id));
        return view("backend.programs.bursa.edit",compact("bursa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bursa = Bursa::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $bursa->penulis_id = Auth::user()->id;
        $bursa->konten = $data['konten'];
        $bursa->save();
        return redirect()->route('bursa.index')->with('success', 'Hubungan bursa berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
