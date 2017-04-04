<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
	public function Ingredient()
	{
		return $this->belongsToMany('App\Ingredient', 'ingredient_pizza', 'pizza_id', 'ingredient_id');
	}
}
