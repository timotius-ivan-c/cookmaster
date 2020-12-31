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
}
