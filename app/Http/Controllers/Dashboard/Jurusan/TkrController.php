<?php

namespace App\Http\Controllers\Dashboard\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan\Tkr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class TkrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tkr = Tkr::first();
        return view("backend.jurusan.tkr.index",compact("tkr"));
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
        $tkr = Tkr::findOrFail(Crypt::decrypt($id));
        return view("backend.jurusan.tkr.edit",compact("tkr"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tkr = Tkr::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:2048',
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
            "judul"=> "min:3|max:100|required",
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/jurusan/" . $tkr->photo;
            if ($tkr->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/jurusan'), $filename);

            $tkr->photo = $filename;
            $tkr->konten = $data['konten'];
            $tkr->judul = $data['judul'];
            $tkr->penulis_id = Auth::user()->id;
            $tkr->save();
            return redirect()->route('tkr.index')->with('success', 'data Jurusna Tkr berhasil diperbarui!');
        }else{
            $tkr->konten = $data['konten'];
            $tkr->judul = $data['judul'];
            $tkr->penulis_id = Auth::user()->id;
        }
    $tkr->save();
    return redirect()->route('tkr.index')->with('success', 'data Jurusna Tkr berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
