<?php

use App\Models\User;

if (!function_exists('verify_trader')) {
    function verify_trader($account_id)
    {
        $trader = User::where('account_id', $account_id)->first();
        $verification_result = true;
        if($trader) {
            if ($trader->hasRole('Vendor')) {
                $is_verified = true;
            } else {
                $is_verified = false;
            }
        } else {
            $trader = null;
            $is_verified = false;
        }
        return [
            'trader' => $trader,
            'verification_result' => $verification_result,
            'is_verified' => $is_verified,
        ];
    }
}
