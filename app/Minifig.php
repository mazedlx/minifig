<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minifig extends Model
{
    protected $fillable = ['name', 'set_id'];

    public function set()
    {
        return $this->belongsTo('App\Set');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
