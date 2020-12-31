<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDetailStep extends Model
{
    //
    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }
}