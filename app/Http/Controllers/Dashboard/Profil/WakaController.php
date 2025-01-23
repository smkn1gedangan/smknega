<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Waka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class WakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $wakas = Waka::latest()->paginate(10);
       return view("backend.profils.waka.index",compact("wakas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.profils.waka.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:3|max:100|required",
            "jabatan"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/waka'), $filename);
            $data["photo"] = $filename;
        }

        Waka::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "jabatan"=> $request->jabatan,

        ]);
        return redirect()->route("waka.index")->with('success', 'data Waka berhasil diupload dan disimpan!');
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
        $waka = Waka::findOrFail(Crypt::decrypt($id));
        if($waka){
            return view("backend.profils.waka.edit",compact("waka"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $waka = Waka::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:3|max:100|required",
            "jabatan"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/waka/" . $waka->photo;
            if ($waka->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/waka'), $filename);

            $waka->photo = $filename;
        }else{
            $waka->nama = $data['nama'];
            $waka->jabatan = $data['jabatan'];
        }
        $waka->save();
        return redirect()->route('waka.index')->with('success', 'Data Waka berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $waka = Waka::findOrFail(Crypt::decrypt($id));
        if ($waka->photo) {
            $imagePath = public_path('img/waka/' . $waka->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $waka->delete();

        return redirect()->route('waka.index')->with('success', 'Data Waka berhasil dihapus!');
    }
}
