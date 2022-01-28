<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public static function show($slug)
    {
        return view('page.' . $slug);
    }
}
