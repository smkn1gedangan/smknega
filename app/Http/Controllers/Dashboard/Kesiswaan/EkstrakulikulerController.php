<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\Ekstrakulikuler;
use App\Models\Kesiswaan\EkstraPhoto;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('ekstraPhotos', 60 * 60 * 24 * 7, function () {
            return EkstraPhoto::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $ekstraPhotos = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );


        $ekstrakulikuler = Cache::remember("ekstrakulikuler",60 * 60 * 24 * 7, function(){
            return Ekstrakulikuler::first();
        });
        return view("backend.kesiswaans.ekstrakulikuler.index",compact("ekstrakulikuler","ekstraPhotos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $ekstrakulikuler = Ekstrakulikuler::findOrFail(Crypt::decrypt($id));
        return view("backend.kesiswaans.ekstrakulikuler.edit",compact("ekstrakulikuler"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail(Crypt::decrypt($id));
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $data = $request->validate([
            'konten' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }else if(trim(str_word_count($value)) < 20){
                        $fail('Konten harus memiliki minimal 20 kata..');

                    }
                },
            ],
        ]);
        $ekstrakulikuler->penulis_id = Auth::user()->id;
        $ekstrakulikuler->konten = $purifier->purify($request->konten);
        $ekstrakulikuler->save();
        Cache::delete("ekstrakulikuler");
        return redirect()->route('ekstrakulikuler.index')->with('success', 'data Ekstrakulikuler Sekolah berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
