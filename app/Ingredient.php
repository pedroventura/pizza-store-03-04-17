<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	public function Pizza()
	{
		return $this->belongsToMany('App\Pizza', 'ingredient_pizza', 'ingredient_id', 'pizza_id');
	}
}
