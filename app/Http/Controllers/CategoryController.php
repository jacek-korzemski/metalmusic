<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function show($slug, $page = 1)
    {
        $skip_posts = ($page - 1) * 15;
        $category = Category::where('slug', $slug)->get()[0];
        $all_posts = Post::where('category_id', $category['id'])->count();
        $posts = Post::where('category_id', $category['id'])->orderBy('date', "DESC")->skip($skip_posts)->take(15)->get();
        $all_pages = ceil($all_posts / 15);
        $pages = [];
        foreach ($posts as $post)
        {
            $post['path'] = "/" . $slug . '/' . $post->slug;
            $post['excerpt'] = Post::get_excerpt($post->content, 24);
        }
        for ($i = 0; $i < $all_pages; $i++)
        {
            array_push($pages, $i + 1);
        }

        return view('blog.category')->with([
            'category_data' => $category,
            'posts' => $posts,
            'current_page' => $page,
            'pages' => $pages,
        ]);
    }
}
