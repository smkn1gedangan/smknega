<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class LinkController extends Controller
{
    public function index()  {
        $link = Cache::remember("links",60 * 60 * 24 * 7,function(){
            return Link::first();
        });
        return view("backend.welcomes.link.index",compact("link"));
    }
    public function edit(string $id)  {
        $link = Link::findOrFail(Crypt::decrypt($id));
        if($link){
            return view("backend.welcomes.link.edit",compact("link"));
        }
    }
    public function update(Request $request , string $id)  {
        $link = Link::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
            "facebook"=>"string|required|url",
            "tiktok"=>"string|required|url",
            "instagram"=>"string|required|url",
            "website"=>"string|required|url",
        ]);

        $link->facebook = $data["facebook"];
        $link->instagram = $data["instagram"];
        $link->tiktok = $data["tiktok"];
        $link->website = $data["website"];
        $link->save();

        Cache::delete("links");
        return redirect()->route('link.index')->with('success', 'Data Link berhasil diperbarui!');
    }
}
