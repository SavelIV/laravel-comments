<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;

class PostController extends Controller
{
    /**
     * @param Post $post
     * @return Renderable
     */
    public function show(Post $post): Renderable
    {
        $count = $post->commentsWithChildrenAndCommenter()->count();
        $comments = $post->commentsWithChildrenAndCommenter()->parentless()->get();

        return view('post.show', compact('post', 'count', 'comments'));
    }
}
