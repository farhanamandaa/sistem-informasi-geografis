<?php

namespace App;

class Location extends Model
{
	protected $fillable = [
		'name','address','latitude','longitude','description','image','category_id'
	];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
