<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page
Route::get('/', function ()
{
    return HomeController::index();
});

// Admin routes
Route::get('/admin', function() 
{
    return 'Miejsce na panel admina';
});

// Auth routes
Auth::routes();

// Static and category routes
Route::get('/{slug}', function($slug) 
{
    if (view()->exists('page.' . $slug)) 
    {
        return PageController::show($slug);
    }
    if (Category::where('slug', $slug)->get()->first() != null) 
    {
        return CategoryController::show($slug);
     }
     return 'nie';
});

// Single article routes
Route::get('/{category_slug}/{slug_or_page}', function($category_slug, $slug_or_page)
{
    if (is_numeric($slug_or_page)) 
    {
        return CategoryController::show($category_slug, $slug_or_page);
    }

    $category = Category::where('slug', $category_slug)->get()->first();
    $post = Post::where('slug', $slug_or_page)->get()->first();

    if ($category == null) {
        return abort(404);
    }

    if ($category != null && $post == null) {
        return redirect('/' . $category['slug']);
    }

    if ($category != null && $post !== null && $category['id'] != $post['category_id']) 
    {
        return redirect('/' . $category['slug']);
    }

    if ($category != null && $post !== null && $category['id'] == $post['category_id'])
    {
        return PostController::show($post['slug']);
    }

    return abort(404);
});
