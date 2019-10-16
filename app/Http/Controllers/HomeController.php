<?php

namespace App\Http\Controllers;

use App\News;
use App\Skill;
use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $skills = Skill::all();
        $news = News::orderBy('published_at')->get();
        $professionals = Professional::with('fields')->get();

        $newsFormatted = $news->transform(
            function ($item, $key) {
                $img = $item->img;
                $item->img = Storage::disk('local')->url($img);
                return $item;
            }
        );

        $professionals = $professionals->transform(
            function ($professional, $key) {
                $image = $professional->img;
                $professional->img = Storage::disk('local')->url($image);
                return $professional;
            }
        );

        return view('welcome', compact('skills', 'professionals', 'newsFormatted'));
    }

    public function get_news($slug)
    {
        $news = News::where('slug', $slug)->first();
        $news->img = Storage::disk('local')->url($news->img);

        return [
            'news' => $news
        ];
    }
}
