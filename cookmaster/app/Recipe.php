<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function favoritedRecipe()
    {
        return $this->belongsTo(FavoritedRecipe::class);
    }
    public function recipeCategory()
    {
        return $this->hasOne(RecipeCategory::class);
    }
    public function recipeDetailStep()
    {
        return $this->belongsTo(RecipeDetailStep::class);
    }
    public function recipeDetailIngredient()
    {
        return $this->belongsTo(RecipeDetailIngredient::class);
    }

}
