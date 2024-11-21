<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Sija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class SijaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sija = Sija::first();
        return view("backend.jurusan.sija.index",compact("sija"));
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
        $sija = Sija::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.sija.edit",compact("sija"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sija = Sija::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "konten"=> "min:6|required",
            "judul"=> "min:3|max:100|required",
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/jurusan/" . $sija->photo;
            if ($sija->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filename);

            $sija->photo = $filename;
            $sija->konten = $data['konten'];
            $sija->judul = $data['judul'];
            $sija->penulis_id = Auth::user()->id;
            $sija->save();
            return redirect()->route('sija.index')->with('success', 'data Sija berhasil diperbarui!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
