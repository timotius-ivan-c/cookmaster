<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    //
}
