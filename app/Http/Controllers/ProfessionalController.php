<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;
use App\Field;
use Illuminate\Support\Facades\Storage;

class ProfessionalController extends Controller
{
    public function get_professionals()
    {
        $professionals = Professional::with('fields')->get();

        $professionals = $professionals->transform(
            function ($professional, $key) {
                $image = $professional->img;
                $professional->img = Storage::disk('local')->url($image);
                return $professional;
            }
        );

        $fields = Field::all();
        return [
          'success' => true,
          'professionals' => $professionals,
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
        $professional->img = Storage::disk('local')->url($professional->img);

        return [
          'success' => true,
          'professional' => $professional,
        ];
    }

    public function delete_professional($id)
    {
        $professional = Professional::find($id);
        $professional->delete();

        return [
          'success' => true,
          'id' => $id,
        ];
    }
}
