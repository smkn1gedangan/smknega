<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index()  {
        $profil = Profil::first();
        return view("backend.welcomes.profil.index",compact("profil"));
    }
    public function edit(string $id)
    {
        $profil = Profil::findOrFail(Crypt::decrypt($id));
        if($profil){
            return view("backend.welcomes.profil.edit",compact("profil"));
        }
    }

    public function update(Request $request, string $id)  {
        $profil = Profil::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "konten"=> "min:6|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/welcome/" . $profil->image;
            if ($profil->image && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/welcome'), $filename);

            $profil->photo = $filename;
            $profil->konten = html_entity_decode($data['konten']);
            $profil->save();

            return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
}
