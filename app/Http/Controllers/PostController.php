<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public static function show($slug)
    {
        return view('blog.post');
    }
}
