<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\BisnisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BisnisPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.programs.bisnis.createPhoto");
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
            $file->move(public_path('img/bisnis'), $filename);

            BisnisPhoto::create(["photo"=>$filename]);

            return redirect()->route('bisnis.index')->with('success', 'Data Photo berhasil ditambah dan disimpan!');
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
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        if($bisnis){
            return view("backend.programs.bisnis.editPhoto",compact("bisnis"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/bisnis/" . $bisnis->photo;
            if ($bisnis->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/bisnis'), $filename);

            $bisnis->photo = $filename;
            $bisnis->save();

            return redirect()->route('bisnis.index')->with('success', 'Data Photo berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bisnis = BisnisPhoto::findOrFail(Crypt::decrypt($id));
        if ($bisnis->photo) {
            $imagePath = public_path('img/bisnis/' . $bisnis->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $bisnis->delete();

        return redirect()->route('bisnis.index')->with('success', 'Data bisnis berhasil dihapus!');

    }
}
