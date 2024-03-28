<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caption',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: function ($val, $attr) {
                switch ($attr['status']):
                    case 0:
                        return 'Pending';
                    case 1:
                        return 'Approved';
                    case 2:
                        return 'Declined';
                    default:
                        return 'Unknown';
                endswitch;
            }
        );
    }

    public function scopeApproved($query)
    {
        $query->where('status', 1);
    }

}
