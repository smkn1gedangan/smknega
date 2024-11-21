<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        return view("backend.profils.logo.index",compact("logo"));
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
        $logo = Logo::findOrFail(Crypt::decrypt($id));
        return view("backend.profils.logo.edit",compact("logo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logo = Logo::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "konten"=> "min:6|required",
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/profil/" . $logo->photo;
            if ($logo->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/profil'), $filename);

            $logo->photo = $filename;
            $logo->konten = $data['konten'];
            $logo->penulis_id = Auth::user()->id;
            $logo->save();
            return redirect()->route('logo.index')->with('success', 'Logo berhasil diperbarui!');
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
