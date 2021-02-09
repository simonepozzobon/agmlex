<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    public function professionals()
    {
        return $this->belongsToMany(Professional::class);
    }
}
