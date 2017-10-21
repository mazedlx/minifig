<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minifig extends Model
{
    protected $fillable = ['name', 'set_id'];

    protected $with = ['images'];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
