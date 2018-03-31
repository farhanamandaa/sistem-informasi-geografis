<?php

namespace App;

class Location extends Model
{
	protected $fillable = [
		'name','address','latitude','longitude','description','image',
	];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
