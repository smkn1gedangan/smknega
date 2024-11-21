<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Models\Program\Bisnis;
use App\Models\Program\BisnisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bisnisPhotos= BisnisPhoto::paginate(10);
        $bisnis = Bisnis::first();
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
        $data = $request->validate([
            "penulis_id"=> "required",
            "konten"=> "min:10|required",
        ]);
        $bisnis->penulis_id = Auth::user()->id;
        $bisnis->konten = $data['konten'];
        $bisnis->save();
        return redirect()->route('bisnis.index')->with('success', 'program bisnis berhasil diperbarui!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
