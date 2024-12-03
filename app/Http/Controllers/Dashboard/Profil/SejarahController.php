<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        return view("backend.profils.sejarah.index",compact("sejarah"));
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
        $sejarah = Sejarah::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.sejarah.edit",compact("sejarah"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sejarah = Sejarah::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
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
            "penulis_id"=> "required",

        ]);
        if ($request->hasFile('photo')) {
            $path = "img/profil/" . $sejarah->photo;
            if ($sejarah->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/profil'), $filename);

            $sejarah->photo = $filename;
            $sejarah->penulis_id = Auth::user()->id;
            $sejarah->konten = $data['konten'];
            $sejarah->save();
            return redirect()->route('sejarah.index')->with('success', 'data sejarah berhasil diperbarui!');
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
