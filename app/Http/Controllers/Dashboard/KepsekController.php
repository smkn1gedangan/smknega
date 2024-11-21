<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
class KepsekController extends Controller
{
    public function index()  {
        $kepsek = Kepsek::latest()->first();
        return view("backend.welcomes.kepsek.index",compact("kepsek"));
    }
    public function edit(string $id)
    {
        $kepsek = Kepsek::findOrFail(Crypt::decrypt($id));
        return view("backend.welcomes.kepsek.edit",compact("kepsek"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kepsek = Kepsek::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "nama"=> "min:6|max:100|required",
            "sambutan"=> "min:10|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/kepala_sekolah/" . $kepsek->image;
            if ($kepsek->image && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kepala_sekolah'), $filename);

            $kepsek->photo = $filename;
            $kepsek->nama = $data['nama'];
            $kepsek->sambutan = $data['sambutan'];
            $kepsek->save();

            return redirect()->route('kepsek.index')->with('success', 'data kepala sekolah berhasil diperbarui!');
    }
}
}
