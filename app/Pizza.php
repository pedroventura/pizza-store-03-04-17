<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
