<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public static function show($slug)
    {
        $post = Post::where('slug', $slug)->take(1)->get();
        $side_posts = Post::where('category_id', $post[0]->category_id)->whereNotIn('id', [$post[0]->id])->take(5)->get();
        return view('blog.post')->with([
            'post' => $post[0],
            'side_posts' => $side_posts
        ]);
    }
}
