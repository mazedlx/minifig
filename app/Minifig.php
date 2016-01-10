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

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc')->first();
    }
}
