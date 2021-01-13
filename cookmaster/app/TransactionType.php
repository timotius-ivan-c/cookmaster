<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    protected $table = 'transaction_types';
    protected $fillable = [
        'name',
    ];
    //
}
