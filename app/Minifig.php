<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minifig extends Model
{
    protected $fillable = ['name', 'set_id'];

    protected $with = ['images'];

    protected $appends = ['setName', 'setNumber'];

    public function getSetNameAttribute()
    {
        return Set::findOrFail($this->set_id)->name;
    }

    public function getSetNumberAttribute()
    {
        return Set::findOrFail($this->set_id)->number;
    }

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
