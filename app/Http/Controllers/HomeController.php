<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }

    /**
     * @return Renderable
     */
    public function about(): Renderable
    {
        return view('about');
    }

    /**
     * @return Renderable
     */
    public function post(): Renderable
    {
        $posts = Post::withCommentsCount()->orderBy('id', 'desc')->get();

        return view('posts', compact('posts'));
    }

    /**
     * @return Renderable
     */
    public function news(): Renderable
    {
        $news = News::withCommentsCount()->orderBy('id', 'desc')->get();

        return view('news', compact('news'));
    }
}
