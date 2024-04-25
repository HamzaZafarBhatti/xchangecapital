<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $logo_path = 'asset/images/';
    protected $favicon_path = 'asset/images/';

    protected $fillable = [
        'title',
        'site_name',
        'site_desc',
        'email',
        'mobile',
        'address',
        'favicon',
        'logo',
        'withdraw_fee',
        'min_withdrawal',
        'max_withdrawal',
        'referral_withdraw_fee',
        'fund_wallet_fee',
        'min_withdrawal_referral',
        'max_withdrawal_referral',
        'usd_black_market_counter',
        'gbp_black_market_counter',
        'usd_referral_bonus',
        'gbp_referral_bonus',
        'msg_to_vendor',
        'min_deposit_by_vendor',
        'max_deposit_by_vendor',
        'min_deposit_by_flutterwave',
        'max_deposit_by_flutterwave',
        'block_after_days',
        'sct_buy_time',
        'sct_convert_time',
        'usd_convert_time',
        'sct_to_usd',
        'usd_to_naira',
    ];

    public function getLogoPath()
    {
        return $this->logo_path;
    }

    public function getFaviconPath()
    {
        return $this->favicon_path;
    }
}
