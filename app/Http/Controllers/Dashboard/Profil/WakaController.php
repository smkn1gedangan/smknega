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

            //backup
            $publicPath = public_path("img/waka/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "waka/" . $filename;

            // upload to public
            $file->move(public_path('img/waka'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('waka.create')->with('error', 'gambar gagal disimpan!');
            }
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
            if ($waka->photo) {
                $publicPath = public_path('img/waka/' . $waka->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."waka/" . $waka->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists($publicPath)) {
                    File::delete($publicPath);
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }


            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            //backup
            $publicPath = public_path("img/waka/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "waka/" . $filename;

            // upload to public
            $file->move(public_path('img/waka'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('waka.index')->with('error', 'gambar gagal disimpan!');
            }

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
            $publicPath = public_path('img/waka/' . $waka->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."waka/" . $waka->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }

        $waka->delete();

        return redirect()->route('waka.index')->with('success', 'Data Waka berhasil dihapus!');
    }
}
