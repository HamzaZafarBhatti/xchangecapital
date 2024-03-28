<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BlockUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:block-unverified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will block users who are not verified still after a day of registration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $set = Setting::first();
        $users = User::where('unblocked_at', '<=', Carbon::now()->subDays($set->block_after_days))
            ->where('is_verified', 0)
            ->update(['is_blocked' => 1]);
        return Command::SUCCESS;
    }
}
