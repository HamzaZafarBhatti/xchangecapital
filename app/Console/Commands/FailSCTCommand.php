<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FailSCTCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fail-sct-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fail the sct transaction after the buy time is over';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
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
