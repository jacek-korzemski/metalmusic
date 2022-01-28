<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\SentBy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $skip_ids = [];
        $categories = Category::get();
        $top_section_posts = Post::where('category_id', 1)->orderBy('date', "DESC")->take(6)->get();
        foreach($top_section_posts as $skip) 
        {
            array_push($skip_ids, $skip->id);
        }

        $sent_by_ids = [];
        foreach (SentBy::get() as $sent_by) 
        {
            array_push($skip_ids, $sent_by->post_id);
            array_push($sent_by_ids, $sent_by->post_id);
        }

        $middle_section_posts = Post::whereNotIn('id', $skip_ids)->take(8)->get();
        $sent_by_section_posts = Post::whereIn('id', $sent_by_ids)->take(3)->get();

        foreach($top_section_posts as $post)
        {
            $post['path'] = Category::where('id', $post->category_id)->first()->get()[0]->slug;
            $post['path'].= '/' . $post->slug;
            $post['excerpt'] = Post::get_excerpt($post->content, 24);
        }

        foreach($middle_section_posts as $post)
        {
            $post['path'] = Category::where('id', $post->category_id)->first()->get()[0]->slug;
            $post['path'].= '/' . $post->slug;
            $post['excerpt'] = Post::get_excerpt($post->content, 24);
        }

        foreach($sent_by_section_posts as $post)
        {
            $post['path'] = Category::where('id', $post->category_id)->first()->get()[0]->slug;
            $post['path'].= '/' . $post->slug;
            $post['excerpt'] = Post::get_excerpt($post->content, 24);
        }

        $tags = Tag::get();

        return view('home')->with([
            'top_section_posts' => $top_section_posts,
            'middle_section_posts' => $middle_section_posts,
            'sent_by_section_posts' => $sent_by_section_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
