<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function get_news()
    {
        $news = News::all();
        return [
            'news' => $news,
        ];
    }
}
