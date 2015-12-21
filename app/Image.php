<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['minifig_id', 'filename'];
    
    public function minifig()
    {
        return $this->belongsTo('App\Minifig');
    }
}
