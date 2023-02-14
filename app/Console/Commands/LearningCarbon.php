<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Facade\Ignition\Tests\Support\Models\Car;
use Illuminate\Console\Command;

class LearningCarbon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'learning:carbon';

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
     * @return void
     */
    public function handle()
    {
        $today = Carbon::now();
        $oneDay = Carbon::createFromFormat('d-m-Y', '25-02-2023');
        $diff = $oneDay->diffInDays($today);
        $this->info("La diferencia de dias es $diff dias");
    }
}
