<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    protected $table = 'followings';
    protected $fillable = [
        'member_id', 'chef_id',
    ];
    //
}
