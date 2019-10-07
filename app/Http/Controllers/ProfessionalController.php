<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;
use App\Field;

class ProfessionalController extends Controller
{
    public function get_professionals()
    {
        $users = Professional::with('fields')->get();
        $fields = Field::all();
        return [
          'success' => true,
          'users' => $users,
          'fields' => $fields,
        ];
    }

    public function create_professional(Request $request)
    {
        $professional = new Professional();
        $professional->name = $request->name;
        $professional->phone = $request->phone;

        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $image = $file->storeAs('public/media', $filename);

        $professional->img = $image;
        $professional->save();

        // trovo le competenze aggiunte
        $fields = collect();
        foreach (json_decode($request->fields) as $key => $value) {
            if ($value == true) {
                $field = Field::find($key);
                // $fields->push($field);

                $professional->fields()->save($field);
            }
        }

        $professional = Professional::where('id', $professional->id)->with('fields')->first();

        return [
          'success' => true,
          'professional' => $professional,
        ];
    }
}
