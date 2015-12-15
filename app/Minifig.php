<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Minifig extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
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
