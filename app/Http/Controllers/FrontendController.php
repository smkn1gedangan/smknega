<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function welcome()  {
        $articles= Article::latest()->take(5)->get();
        return view("frontend.welcome",compact("articles"));
   }
}
