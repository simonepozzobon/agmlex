<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $table = 'professionals';

    public function fields()
    {
        return $this->belongToMany(Field::class);
    }
}
