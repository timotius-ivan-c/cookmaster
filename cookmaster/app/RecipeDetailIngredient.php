<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDetailIngredient extends Model
{
    //
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    protected $table = 'recipe_detail_ingredients';
    protected $fillable = [
        'name', 'notes',
    ];
}
