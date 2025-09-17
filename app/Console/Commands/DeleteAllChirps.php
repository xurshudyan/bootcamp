<?php

namespace App\Console\Commands;

use App\Models\Chirp;
use Illuminate\Console\Command;

class DeleteAllChirps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chirps:delete-all {--force : Delete without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all chirps from the database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $force = $this->option('force');

        if (!$force && !$this->confirm('Are you sure you want to delete all chirps?')) {
            $this->info('Operation cancelled.');
            return Command::SUCCESS;
        }

        $count = Chirp::count();
        Chirp::truncate();

        $this->info("Successfully deleted {$count} chirps.");

        return Command::SUCCESS;
    }
}
