<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;

class ProfessionalController extends Controller
{
    public function get_users()
    {
        $users = Professional::with('fields')->get();
        return [
          'success' => true,
          'users' => $users,
        ];
    }
}
