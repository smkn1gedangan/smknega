<?php

namespace App\Http\Controllers\Dashboard\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Drive;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('drives', 60, function () {
            return Drive::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $drives = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("backend.informasis.drive.index",compact("drives"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.informasis.drive.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul"=>"required|min:3|max:100",
            "link"=>"required|min:3|max:100|url",
        ]);

        DB::insert("insert into drives (judul,link) values (?,?)",[
            $request->judul,$request->link
        ]);
        Cache::delete("drives");
        return redirect()->route('drive.index')->with('success', 'Berhasil menambah drive baru!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete("delete from drives where id = ?",[Crypt::decrypt($id)]);
        Cache::delete("drives");
        return redirect()->route('drive.index')->with('success', 'Data Drive berhasil dihapus!');
    }
}
