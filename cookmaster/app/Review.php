<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    protected $table = 'reviews';
    protected $fillable = [
        'recipe_id', 'user_id', 'review_text',
    ];
    //
}
