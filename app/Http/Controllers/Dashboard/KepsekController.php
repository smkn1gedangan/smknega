<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use HTMLPurifier;
use HTMLPurifier_Config;
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
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
            'photo' => 'file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:6|max:100|required",
            'sambutan' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('sambutan tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('sambutan harus memiliki minimal 20 kata..');

                    }
                },
            ],
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/kepala_sekolah/" . $kepsek->photo;
            if ($kepsek->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kepala_sekolah'), $filename);

            $kepsek->photo = $filename;
            $kepsek->nama = $data['nama'];
            $kepsek->sambutan = $purifier->purify($request->sambutan);

        }else{
            $kepsek->nama = $data['nama'];
            $kepsek->sambutan = $purifier->purify($request->sambutan);
        }
        $kepsek->save();
        return redirect()->route('kepsek.index')->with('success', 'data kepala sekolah berhasil diperbarui!');
}
}
