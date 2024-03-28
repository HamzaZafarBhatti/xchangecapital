<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundWalletLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ref_id',
        'requested_amount',
        'currency',
        'fee',
        'charged_amount',
        'transaction_id',
        'status', //0=>pending, 1=>successful, 2=>failed, 3=>cancelled
        'converted_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attr) {
                switch ($attr['status']) {
                    case 0:
                        return 'Pending';
                        break;
                    case 1:
                        return 'Successful';
                        break;
                    case 2:
                        return 'Failed';
                        break;
                    case 3:
                        return 'Cancelled';
                        break;
                    default:
                        return 'N/A';
                }
            }
        );
    }

    protected function getRequestedAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => strtoupper($attr['currency']) . ' ' . $attr['requested_amount']
        );
    }

    protected function getFee(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $attr['fee']
        );
    }

    protected function getConvertedAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $attr['converted_amount']
        );
    }

    protected function getChargedAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $attr['charged_amount']
        );
    }
}
