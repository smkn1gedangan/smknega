<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::latest()->paginate(10);
        return view("backend.guru.index",compact("gurus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.guru.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/guru'), $filename);
            $data["photo"] = $filename;
        }

        Guru::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "tugas"=> $request->tugas,

        ]);
        return redirect()->route("guru.index")->with('success', 'Data guru berhasil diupload dan disimpan!');
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
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        if($guru){
            return view("backend.guru.edit",compact("guru"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "min:10|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/guru/" . $guru->image;
            if ($guru->image && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/guru'), $filename);

            $guru->photo = $filename;
            $guru->nama = $data['nama'];
            $guru->tugas = $data['tugas'];
            $guru->save();

            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        if ($guru->photo) {
            $imagePath = public_path('img/guru/' . $guru->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');

    }
}
