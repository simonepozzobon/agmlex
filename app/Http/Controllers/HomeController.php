<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $skills = Skill::all();
        $professionals = Professional::with('fields')->get();

        $professionals = $professionals->transform(
            function ($professional, $key) {
                $image = $professional->img;
                $professional->img = Storage::disk('local')->url($image);
                return $professional;
            }
        );

        return view('welcome', compact('skills', 'professionals'));
    }
}
