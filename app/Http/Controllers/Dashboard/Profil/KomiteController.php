<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\DeskripsiKomite;
use App\Models\Profil\KetuaKomite;
use App\Models\Profil\Komite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class KomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komites = Komite::latest()->paginate(10);
        $ketuaKomites = KetuaKomite::get();
        return view("backend.profils.Komite.index",compact("komites","ketuaKomites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.profils.Komite.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            "jabatan"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/komite'), $filename);
            $data["photo"] = $filename;
        }

        Komite::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "jabatan"=> $request->jabatan,

        ]);
        return redirect()->route("komite.index")->with('success', 'data Komite berhasil diupload dan disimpan!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $komite = Komite::findOrFail(Crypt::decrypt($id));
        if($komite){
            return view("backend.profils.Komite.edit",compact("komite"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komite = komite::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:6|max:100|required",
            "jabatan"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/komite/" . $komite->photo;
            if ($komite->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/komite'), $filename);

            $komite->photo = $filename;
    }else{
        $komite->nama = $data['nama'];
        $komite->jabatan = $data['jabatan'];
    }
    $komite->save();
    return redirect()->route('komite.index')->with('success', 'Data Komite berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komite = Komite::findOrFail(Crypt::decrypt($id));
        if ($komite->photo) {
            $imagePath = public_path('img/komite/' . $komite->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $komite->delete();

        return redirect()->route('komite.index')->with('success', 'Data Komite berhasil dihapus!');

    }
    }

