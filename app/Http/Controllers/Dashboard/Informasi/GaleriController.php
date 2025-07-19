<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $datas = Cache::remember('galeris', 60 * 60 * 24 * 7, function () {
            return Galeri::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $galeris = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("backend.informasis.galeri.index",compact("galeris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.informasis.galeri.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "judul"=> "min:6|max:100|required",
        ]);

        if ($request->hasFile('photo')) {

            $sourcePath = $request->file("photo")->store("galeri","public");
            $backupPath = env("BACKUP_PHOTOS") .  $sourcePath;


            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy(storage_path("app/public/".$sourcePath), $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };
            $data["photo"] = $sourcePath;
        }

        Galeri::create([
            "photo"=> $data["photo"],
            "judul"=> $request->judul,

        ]);
        Cache::delete("galeris");
        Cache::delete("galeris_take_2");
        return redirect()->route("galeri.index")->with('success', 'Data Galeri berhasil diupload dan disimpan!');

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
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        if($galeri){
            return view("backend.informasis.galeri.edit",compact("galeri"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'required|file|mimes:jpg,png,jpeg|max:5096',
            "judul"=> "min:6|max:100|required",
        ]);
        if ($request->hasFile('photo')) {
            if ($galeri->photo) {
                $publicPath = public_path('img/galeri/' . $galeri->photo); // Lokasi pertama (public)
                $backupPath = env("BACKUP_PHOTOS") ."galeri/" . $galeri->photo; // Lokasi kedua (backup)

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
            $publicPath = public_path("img/galeri/" . $filename);
            $backupPath = env("BACKUP_PHOTOS") . "galeri/" . $filename;

            // upload to public
            $file->move(public_path('img/galeri'), $filename);

            if (!file_exists(dirname($backupPath))) {
                mkdir(dirname($backupPath), 0777, true);
            }
            // Simpan juga ke folder backup
            if(!copy($publicPath, $backupPath)){
                return redirect()->back()->with('error', 'gambar gagal disimpan!');
            };

            $galeri->photo = $filename;


        }
            $galeri->judul = $data['judul'];
            $galeri->save();
            Cache::delete("galeris");
            Cache::delete("galeris_take_2");
            return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        if ($galeri->photo) {
            $backupPath = env("BACKUP_PHOTOS") ."galeri/" . $galeri->photo; // Lokasi kedua (backup)

            // Hapus file di lokasi pertama (public)
            if (File::exists(storage_path("app/public/".$galeri->photo))) {
                File::delete(storage_path("app/public/".$galeri->photo));
            }

            // Hapus file di lokasi kedua (backup)
            if (File::exists($backupPath)) {
                File::delete($backupPath);
            }
        }
        $galeri->delete();
        Cache::delete("galeris");
        Cache::delete("galeris_take_2");
        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil dihapus!');
    }
}
