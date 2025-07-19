<?php

namespace App\Http\Controllers\Dashboard\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Waka;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class WakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $datas = Cache::remember('wakas', 60, function () {
            return Waka::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $wakas = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
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

            $sourcePath = $request->file("photo")->store("waka","public");
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

            Waka::create([
            "photo"=> $data["photo"],
            "nama"=> $request->nama,
            "jabatan"=> $request->jabatan,

        ]);
        Cache::delete("wakas");
        Cache::delete("wakas_take_10");
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
                $backupPath = env("BACKUP_PHOTOS") . $waka->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$waka->photo))) {
                    File::delete(storage_path("app/public/".$waka->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }
            $sourcePath = $request->file("photo")->store("waka","public");
            $backupPath = env("BACKUP_PHOTOS") . $sourcePath;


            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $waka->photo = $sourcePath;
        }
        $waka->nama = $data['nama'];
        $waka->jabatan = $data['jabatan'];
        $waka->save();
        Cache::delete("wakas");
        Cache::delete("wakas_take_10");
        return redirect()->route('waka.index')->with('success', 'Data Waka berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $waka = Waka::findOrFail(Crypt::decrypt($id));
        if ($waka->photo) {
                $backupPath = env("BACKUP_PHOTOS") . $waka->photo; // Lokasi kedua (backup)

                // Hapus file di lokasi pertama (public)
                if (File::exists(storage_path("app/public/".$waka->photo))) {
                    File::delete(storage_path("app/public/".$waka->photo));
                }

                // Hapus file di lokasi kedua (backup)
                if (File::exists($backupPath)) {
                    File::delete($backupPath);
                }
            }

        $waka->delete();
        Cache::delete("wakas");
        Cache::delete("wakas_take_10");
        return redirect()->route('waka.index')->with('success', 'Data Waka berhasil dihapus!');
    }
}
