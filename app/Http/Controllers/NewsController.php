<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function get_news()
    {
        $news = News::all();

        $news = $news->transform(
            function ($item, $key) {
                $image = $item->img;
                $item->img = Storage::disk('local')->url($image);
                return $item;
            }
        );

        return [
            'news' => $news,
        ];
    }

    public function get_single_news($id)
    {
        $news = News::where('id', $id)->first();
        $news->img = Storage::disk('local')->url($news->img);
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

    public function create(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->content = $request->content;
        $news->published_at = $request->published_at;

        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $image = $file->storeAs('public/media', $filename);

        $news->img = $image;
        $news->save();

        return [
            'success' => true,
            'news' => $news
        ];
    }

    public function edit(Request $request)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at;

        if ($request->slug != $news->slug) {
            $news->slug = $request->slug;
        }

        if ($request->hasFile('file') && $request->file) {
            $file = $request->file('file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $image = $file->storeAs('public/media', $filename);

            $news->img = $image;
        }

        $news->save();

        return [
            'success' => true,
            'news' => $news
        ];
    }

    public function delete_news($id)
    {
        $news = News::find($id);
        $news->delete();

        return [
          'success' => true,
          'id' => $id,
        ];
    }
}
