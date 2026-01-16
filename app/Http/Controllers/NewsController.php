<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Support\Renderable;

class NewsController extends Controller
{
    /**
     * @param News $news
     * @return Renderable
     */
    public function show(News $news): Renderable
    {
        $count = $news->commentsWithChildrenAndCommenter()->count();
        $comments = $news->commentsWithChildrenAndCommenter()->parentless()->get();

        return view('news.show', compact('news', 'count', 'comments'));
    }
}
