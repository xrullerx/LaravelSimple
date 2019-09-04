<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowArcCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:show:arc {arc}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prints the command argument';

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
        $this->info('command argument:');
        $this->info($this->argument('arc'));
    }
}
