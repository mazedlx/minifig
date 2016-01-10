<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = ['name', 'number', 'filename'];

    public function minifigs()
    {
        return $this->hasMany('App\Minifig')->orderBy('name', 'asc');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'DESC')->first();
    }
}
