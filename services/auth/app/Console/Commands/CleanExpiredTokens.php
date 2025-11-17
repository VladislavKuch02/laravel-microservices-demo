<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CleanExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаляет просроченные токены';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = DB::table('personal_access_tokens')
            ->where('expires_at', '<', Carbon::now())
            ->delete();

        $this->info("Deleted $count expired tokens.");
    }
}
