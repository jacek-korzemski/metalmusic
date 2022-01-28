<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function show($slug)
    {
        $category = Category::where('slug', $slug)->get()[0];
        $posts = Post::where('category_id', $category['id'])->orderBy('date', "DESC")->take(15)->get();
        foreach ($posts as $post)
        {
            $post['path'] = $slug . '/' . $post->slug;
            $post['excerpt'] = Post::get_excerpt($post->content, 24);
        }

        return view('blog.category')->with([
            'category_data' => $category,
            'posts' => $posts
        ]);
    }
}
