<?php

namespace App\Console\Commands;

use App\Jobs\ClassResultJob7;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClassResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ClassResult';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Log::info('start');
        ClassResultJob7::dispatch();
        Log::info('65656565');
    }
}
