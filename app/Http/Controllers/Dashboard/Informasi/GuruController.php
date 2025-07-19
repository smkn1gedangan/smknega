<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('gurus', 60, function () {
            return Guru::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $gurus = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
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
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "required|max:100",
        ]);

        if ($request->hasFile('photo')) {


            $sourcePath = $request->file("photo")->store("guru","public");
            $backupPath = env("BACKUP_PHOTOS") . $sourcePath;

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
               return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $data["photo"] = $sourcePath;
        }

        Guru::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "tugas"=> $request->tugas,

        ]);
        Cache::delete("gurus");
        return redirect()->route("guru.create")->with('success', 'Data guru berhasil diupload dan disimpan!');
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
           'photo' => 'file|mimes:jpg,png,jpeg|max:5096',
            "nama"=> "min:6|max:100|required",
            "tugas"=> "min:3|required",
        ]);
        if ($request->hasFile('photo')) {
            if ($guru->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $guru->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$guru->photo))) {
                    File::delete(storage_path("app/public/".$guru->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }


            $sourcePath = $request->file("photo")->store("guru","public");
            $backupPath = env("BACKUP_PHOTOS") . $sourcePath;


            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $guru->photo = $sourcePath;
        }
        $guru->nama = $data['nama'];
        $guru->tugas = $data['tugas'];
        $guru->save();
        Cache::delete("gurus");
        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
         if ($guru->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $guru->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$guru->photo))) {
                    File::delete(storage_path("app/public/".$guru->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }
        $guru->delete();
        Cache::delete("gurus");
        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');

    }
}
