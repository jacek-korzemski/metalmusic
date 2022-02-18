<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public static function show($slug)
    {
        $post = Post::where('slug', $slug)->take(1)->get();
        $post[0]['excerpt'] = Post::get_excerpt($post[0]->content);
        $category = Category::where('id', $post[0]['category_id'])->first()->get()[0]->slug;
        $side_posts = Post::where('category_id', $post[0]->category_id)->whereNotIn('id', [$post[0]->id])->take(5)->get();
        foreach($side_posts as $side_post)
        {
            $side_post['path'] = "/" . $category . "/" . $side_post['slug'];
        }
        return view('blog.post')->with([
            'post' => $post[0],
            'side_posts' => $side_posts
        ]);
    }
}
