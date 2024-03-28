<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopEarner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . number_format($attr['amount'], 2)
        );
    }
}
