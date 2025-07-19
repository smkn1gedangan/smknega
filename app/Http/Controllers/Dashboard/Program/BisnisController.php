<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\Bisnis;
use App\Models\Program\BisnisPhoto;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class BisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cache::remember('bisnisPhotos', 60 * 60 * 24 * 7, function () {
            return BisnisPhoto::latest()->get(); // seluruh data guru
        });
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = collect($datas)->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $bisnisPhotos = new LengthAwarePaginator(
            $currentItems,
            count($datas),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        $bisnis = Cache::remember("bisnis",60 * 60 * 24 * 7 , function(){
            return Bisnis::first();
        });
        return view("backend.programs.bisnis.index",compact("bisnis","bisnisPhotos"));
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
        $bisnis = Bisnis::findOrFail(Crypt::decrypt($id));
        return view("backend.programs.bisnis.edit",compact("bisnis"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bisnis = Bisnis::findOrFail(Crypt::decrypt($id));
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
        $bisnis->penulis_id = Auth::user()->id;
        $bisnis->konten = $purifier->purify($request->konten);;
        $bisnis->save();
        Cache::delete("bisnis");
        return redirect()->route('bisnis.index')->with('success', 'data Program bisnis Sekolah berhasil diperbarui!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
