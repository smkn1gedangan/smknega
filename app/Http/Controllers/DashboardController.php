<?php

namespace App\Http\Controllers;

use App\Models\Masukan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $user = User::count();
        $masukan = Masukan::count();
        return view("backend.dashboard",compact("user","masukan"));
    }
}
