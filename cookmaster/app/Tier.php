<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'tiers';
    protected $fillable = [
        'name',
    ];
    //
}
