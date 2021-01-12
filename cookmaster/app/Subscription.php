<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
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
