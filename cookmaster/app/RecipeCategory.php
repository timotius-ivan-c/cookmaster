<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    //
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    protected $table = 'recipe_categories';

}
