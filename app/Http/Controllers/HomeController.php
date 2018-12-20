<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Professional;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $skills = Skill::all();
        $professionals = Professional::all();

        return view( 'welcome', compact( 'skills', 'professionals' ) );
    }
}
