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

    public function check_slug(Request $request)
    {
        $slug = $request->slug;
        $news = News::where('slug', $slug)->first();

        if ($news) {
            return [
                'success' => false,
                'error' => 'lo slug esiste già',
            ];
        } else {
            return [
                'success' => true,
            ];
        }
    }
}
