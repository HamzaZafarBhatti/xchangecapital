<?php

namespace App\Providers;

use App\Models\BlackmarketLog;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Schema::defaultStringLength(191);
        $blackmarketsales = BlackmarketLog::where('status', 0)->get();
        if (count($blackmarketsales) > 0) {
            foreach ($blackmarketsales as $key => $value) {
                // Log::info($value);
                $user = User::find($value->user_id);
                $end_time = Carbon::parse($value->completed_at)->format("Y-m-d H:i:s");
                if (Carbon::now() > $end_time) {
                    if ($value->currency === 'sct') {
                        $user->update(['usd_wallet' => $user->usd_wallet + $value->amount_exchanged]);
                        $value->update(['status' => 1]);
                    }
                    if ($value->currency === 'usd') {
                        $user->update(['ngn_wallet' => $user->ngn_wallet + $value->amount_exchanged]);
                        $value->update(['status' => 1]);
                    }
                }
            }
        }
        $transactions = Transaction::where('status', 'pending')->get();
        if (count($transactions) > 0) {
            $settings = Setting::first();
            foreach ($transactions as $value) {
                if (Carbon::now() > $value->created_at->addMinutes($settings->sct_buy_time)) {
                    $value->update(['status' => 'failed']);
                }
            }
        }
    }
}
