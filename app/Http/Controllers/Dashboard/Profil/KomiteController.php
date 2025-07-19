<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\DeskripsiKomite;
use App\Models\Profil\KetuaKomite;
use App\Models\Profil\Komite;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class KomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('komites', 60, function () {
            return Komite::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $komites = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        $ketuaKomite = Cache::remember("ketuaKomite",60 * 60 * 24 * 7,function(){
            return KetuaKomite::first();
        });
        return view("backend.profils.Komite.index",compact("komites","ketuaKomite"));
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

            $sourcePath = $request->file("photo")->store("komite","public");
            $backupPath = env("BACKUP_PHOTOS") . $sourcePath;

            // upload to public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/". $sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            }
            $data["photo"] = $sourcePath;
        }

        Komite::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "jabatan"=> $request->jabatan,

        ]);
        Cache::delete("komites");
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
            if ($komite->photo) {
                $backupPath = env("BACKUP_PHOTOS")  . $komite->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $komite->photo))) {
                    File::delete(storage_path("app/public/". $komite->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

            $sourcePath = $request->file("photo")->store("komite","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;

            // upload to public

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/". $sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            }
            $komite->photo = $sourcePath;
        }
        $komite->nama = $data['nama'];
        $komite->jabatan = $data['jabatan'];
        $komite->save();
        Cache::delete("komites");
        return redirect()->route('komite.index')->with('success', 'Data Komite berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komite = Komite::findOrFail(Crypt::decrypt($id));
        if ($komite->photo) {
                $backupPath = env("BACKUP_PHOTOS")  . $komite->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/". $komite->photo))) {
                    File::delete(storage_path("app/public/". $komite->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
        }
        $komite->delete();
        Cache::delete("komites");
        return redirect()->route('komite.index')->with('success', 'Data Komite berhasil dihapus!');

    }
    }

