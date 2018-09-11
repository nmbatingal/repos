<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use PDOException;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create \'research\' database';

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
     * @return mixed
     */
    public function handle()
    {
        $database = env('DB_DATABASE', false);

        if (! $database) {

            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
        }

        try {
            
            $db = DB::statement('CREATE DATABASE '.$database);

            $this->info(sprintf('Successfully created %s database', $database));

        } catch (PDOException $exception) {
            
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }
}
