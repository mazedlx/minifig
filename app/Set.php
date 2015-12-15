<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Set extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'number', 'filename'];
    
    public function minifigs()
    {
    	return $this->hasMany('App\Minifig');
    }
}
