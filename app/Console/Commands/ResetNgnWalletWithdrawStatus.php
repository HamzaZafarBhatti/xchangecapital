<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ResetNgnWalletWithdrawStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:ngn-wallet-withdraw-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will reset the ngn wallet withdraw status.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::where('is_ngn_wallet_withdrawn', 1)->update([
            'is_ngn_wallet_withdrawn' => 0
        ]);
        return Command::SUCCESS;
    }
}
