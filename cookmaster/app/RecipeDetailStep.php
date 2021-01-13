<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDetailStep extends Model
{
    //
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    protected $table = 'recipe_detail_steps';
    protected $fillable = [
        'recipe_id', 'text', 'image',
    ];
}
