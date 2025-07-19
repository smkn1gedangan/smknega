<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Masukan;
use App\Models\StatistikPengunjung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index()  {

        return view("backend.dashboard");
    }
    public function profileUser($id)  {
        $user = User::where("id",$id)->first();
        return view("profile.edit",compact("user"));
    }

    public function deleteMasukan(string $id)  {
        $masukan = Masukan::findOrFail(Crypt::decrypt($id));
        $masukan->delete();
        return redirect()->back()->with("success","data Masukan telah berhasil dihapus");
    }
}
