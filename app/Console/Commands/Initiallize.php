<?php

namespace App\Console\Commands;

use App\Model\Block;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Model\Day;

class Initiallize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize this program for using';

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
        for ($i = 0; $i <= 30; $i++)
        {
            Day::create([
                'date' => Carbon::today()->addDays($i)->toDateTimeString(),
            ]);
        }

        $days = Day::all();

        foreach ($days as $day)
        {
            $day->createBlocks();
        }
    }
}
