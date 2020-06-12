<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    protected $guarded = [];

    public function meals()
    {
    	return $this->belongsToMany('App\Meal');
    }
}
