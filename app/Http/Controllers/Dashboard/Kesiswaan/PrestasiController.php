<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('prestasis', 60, function () {
            return Prestasi::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $prestasis = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("backend.kesiswaans.prestasi.index",compact("prestasis"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.kesiswaans.prestasi.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama"=> "max:100|required",
            "juara"=> "min:1|required|max:100",
            "tingkat"=> "required|max:100",
            "penyelenggara"=> "required|max:100",
        ]);
        Prestasi::create([
            "nama"=> $request->nama,
            "juara"=> $request->juara,
            "tingkat"=> $request->tingkat,
            "penyelenggara"=> $request->penyelenggara,

        ]);
        Cache::delete("prestasis");
        return redirect()->route("prestasi.index")->with('success', 'Data Prestasi diupload dan disimpan!');

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
        $prestasi = Prestasi::findOrFail(Crypt::decrypt($id));
        if($prestasi){
            return view("backend.kesiswaans.prestasi.edit",compact("prestasi"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestasi = Prestasi::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "nama"=> "max:100|required",
            "juara"=> "min:1|required|max:100",
            "tingkat"=> "required|max:100",
            "penyelenggara"=> "required|max:100",
        ]);
        $prestasi->nama = $data['nama'];
        $prestasi->juara = $data['juara'];
        $prestasi->tingkat = $data['tingkat'];
        $prestasi->penyelenggara = $data['penyelenggara'];
        $prestasi->save();
        Cache::delete("prestasis");
        return redirect()->route('prestasi.index')->with('success', 'Data Prestasi berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Prestasi::findOrFail(Crypt::decrypt($id));
        $guru->delete();

        return redirect()->route('prestasi.index')->with('success', 'Data Prestasu berhasil dihapus!');
    }
}
