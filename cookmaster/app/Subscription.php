<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function chef()
    {
        return $this->hasOne(User::class, 'id', 'chef_id');
    }

    public function recipe()
    {
        return $this->hasManyThrough(Recipe::class, User::class, 'id', 'author_id', 'chef_id', 'id')->orderBy('publish_date', 'desc');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    protected $table = 'subscriptions';
    protected $fillable = [
        'transactiond_id','member_id', 'chef_id','start','duration','end'
    ];
    //
}
