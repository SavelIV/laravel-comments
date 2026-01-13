<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $post = Post::first();

        return view('home', compact('post'));
    }
}
