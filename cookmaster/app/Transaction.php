<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transactionType()
    {
        return $this->hasOne(TransactionType::class);
    }
    public function suscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    //
}
