<?php

namespace App\Http\Controllers;

use App\Models\Masukan;
use App\Models\StatistikPengunjung;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $user = User::count();
        $masukans = Masukan::take(3)->get();
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

        return view("backend.dashboard",compact("user","masukans","months","visitorsData"));
    }
}
