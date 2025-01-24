<?php

namespace App\Http\Controllers\Dashboard\Informasi;

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
        return view("backend.informasis.guru.index",compact("gurus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.informasis.guru.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $publicPath = public_path("img/guru/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "guru/" . $filename;

            // upload to public
            $file->move(public_path('img/guru'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('guru.create')->with('error', 'gambar gagal disimpan!');
            };
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
            return view("backend.informasis.guru.edit",compact("guru"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:5096',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            if ($guru->photo) {
                $publicPath = public_path('img/guru/' . $guru->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."guru/" . $guru->photo; // Lokasi kedua (backup)

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

            $publicPath = public_path("img/guru/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "guru/" . $filename;

            // upload to public
            $file->move(public_path('img/guru'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->route('guru.index')->with('error', 'gambar gagal disimpan!');
            };
            $guru->photo = $filename;


        }else{
            $guru->nama = $data['nama'];
            $guru->tugas = $data['tugas'];
        }
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        if ($guru->photo) {
            $publicPath = public_path('img/guru/' . $guru->photo); // Lokasi pertama (public)
            $backupPath = env("BACKUP_PHOTOS") ."guru/" . $guru->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists($publicPath)) {
                File::delete($publicPath);
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');

    }
}
