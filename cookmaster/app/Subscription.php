<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function Transaction()
    {
        return $this->hasOne(User::class);
    }
    //
}
