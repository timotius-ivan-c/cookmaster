<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDetailIngredient extends Model
{
    //
    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }
}
