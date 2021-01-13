<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritedRecipe extends Model
{
    //
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
    protected $table = 'favorited_recipes';
    protected $fillable = [
        'user_id', 'recipe_id',
    ];
}
