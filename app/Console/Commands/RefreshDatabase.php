<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class RefreshDatabase
 * @package App\Console\Commands
 * Use Command  for test data
 */
class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for refresh DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (app()->environment('local')) {

            \DB::statement('SET FOREIGN_KEY_CHECKS=0');

            \DB::table('users')->truncate();
            \DB::table('clients')->truncate();
            \DB::table('companies')->truncate();
            \DB::table('client_company')->truncate();

            \DB::statement('SET FOREIGN_KEY_CHECKS=1');

            \Artisan::call('db:seed');

            $this->info('Database refreshed successfully');
        } else {
            $this->error('ERROR! This command is only available in a local environment!');
        }
    }
}
