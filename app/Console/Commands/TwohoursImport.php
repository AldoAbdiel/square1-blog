<?php

namespace App\Console\Commands;

use App\Http\Controllers\ImportController;
use Illuminate\Console\Command;

class TwohoursImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twohours:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves posts data from an API';

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
        // Make an automatic import from the API
        $import = ImportController::class;

        $apiPosts = $import->getAPI();
        $import->saveRetrievedPosts($apiPosts);
        $this->info('Minute update successful');
        //return 1;
    }
}
