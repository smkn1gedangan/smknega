<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\OsisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class OsisPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.kesiswaans.osis.createPhoto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:3|max:100|required",
            "jabatan"=> "min:3|required",
         ]);
         if ($request->hasFile('photo')) {

             $file = $request->file('photo');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('img/osis'), $filename);

             OsisPhoto::create([
                "photo"=>$filename,
                "nama"=> $request->nama,
                "jabatan"=> $request->jabatan
            ]);

             return redirect()->route('osis.index')->with('success', 'Osis berhasil ditambah dan disimpan!');
         }
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
        $osisPhoto = OsisPhoto::findOrFail(Crypt::decrypt($id));
        if($osisPhoto){
            return view("backend.kesiswaans.osis.editPhoto",compact("osisPhoto"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $osis = OsisPhoto::findOrFail(Crypt::decrypt($id));
        $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:5096',
           "nama"=> "min:3|max:100|required",
           "jabatan"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/osis/" . $osis->photo;
            if ($osis->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/osis'), $filename);

            $osis->photo = $filename;


        }else{
            $osis->nama = $request->nama;
            $osis->jabatan = $request->jabatan;
        }
        $osis->save();

        return redirect()->route('osis.index')->with('success', 'Data Osis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $osis = OsisPhoto::findOrFail(Crypt::decrypt($id));
        if ($osis->photo) {
            $imagePath = public_path('img/osis/' . $osis->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $osis->delete();

        return redirect()->route('osis.index')->with('success', 'Data Osis berhasil dihapus!');
    }
}
