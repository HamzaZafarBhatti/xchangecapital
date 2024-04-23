<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $transactionPath = 'asset/images/transactions/';

    protected $fillable = [
        'order_id',
        'sct_amount',
        'ngn_amount',
        'merchant_id',
        'user_id',
        'image',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id', 'id');
    }

    public function getTransactionPath()
    {
        return $this->transactionPath;
    }
}
