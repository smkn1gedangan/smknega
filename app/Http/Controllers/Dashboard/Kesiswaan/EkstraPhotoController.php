<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\EkstraPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class EkstraPhotoController extends Controller
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
        return view("backend.kesiswaans.ekstrakulikuler.createPhoto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
         ]);
         if ($request->hasFile('photo')) {

             $file = $request->file('photo');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('img/ekstra'), $filename);

             EkstraPhoto::create(["photo"=>$filename]);

             return redirect()->route('ekstrakulikuler.index')->with('success', 'Photo ekstrakulikuler berhasil ditambah dan disimpan!');
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
        $ekstraPhoto = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        if($ekstraPhoto){
            return view("backend.kesiswaans.ekstrakulikuler.editPhoto",compact("ekstraPhoto"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ekstra = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/ekstra/" . $ekstra->photo;
            if ($ekstra->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/ekstra'), $filename);

            $ekstra->photo = $filename;
            $ekstra->save();

            return redirect()->route('ekstrakulikuler.index')->with('success', 'Data Photo Ekstrakulikuler berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekstra = EkstraPhoto::findOrFail(Crypt::decrypt($id));
        if ($ekstra->photo) {
            $imagePath = public_path('img/ekstra/' . $ekstra->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $ekstra->delete();

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data Photo Ekstrakulikuler berhasil dihapus!');
}
}
