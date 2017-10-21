<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = ['name', 'number', 'filename'];

    protected $with = ['minifigs'];

    public function minifigs()
    {
        return $this->hasMany(Minifig::class)->orderBy('name', 'asc');
    }
}
