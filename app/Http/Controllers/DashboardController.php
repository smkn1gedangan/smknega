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
        $links = Link::get();
        $masukans = Masukan::take(5)->latest()->get();
        $monthlyVisitors = StatistikPengunjung::selectRaw('MONTH(visited_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->get()
        ->pluck('total', 'month');

        $months = [];
        $visitorsData = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = \Carbon\Carbon::create()->month(value: $i)->format(format: 'F');
            $visitorsData[] = $monthlyVisitors->get($i, 0);
        }

        return view("backend.dashboard",compact("masukans","months","visitorsData"));
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
