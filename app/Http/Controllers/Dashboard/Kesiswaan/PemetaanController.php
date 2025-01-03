<?php

namespace App\Http\Controllers\Dashboard\Kesiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan\Pemetaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class PemetaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemetaan = Pemetaan::first();
        return view("backend.kesiswaans.pemetaan.index",compact("pemetaan"));
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
        $pemetaan = Pemetaan::findOrFail(Crypt::decrypt($id));
        return view("backend.kesiswaans.pemetaan.edit",compact("pemetaan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemetaan = Pemetaan::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'photo' => 'file|mimes:jpg,png,pdf|max:2048',
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
            "penulis_id"=> "required"
        ]);
        if ($request->hasFile('photo')) {
            $path = "img/pemetaan/" . $pemetaan->photo;
            if ($pemetaan->photo && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/pemetaan'), $filename);

            $pemetaan->photo = $filename;
            $pemetaan->konten = $data['konten'];
            $pemetaan->penulis_id = Auth::user()->id;

        }else{
            $pemetaan->konten = $data['konten'];
            $pemetaan->penulis_id = Auth::user()->id;
        }
    $pemetaan->save();
    return redirect()->route('pemetaan.index')->with('success', 'data Pemetaan Kelulusan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
