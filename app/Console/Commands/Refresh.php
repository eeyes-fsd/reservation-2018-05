<?php

namespace App\Console\Commands;

use App\Model\Day;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

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
     * @return mixed
     */
    public function handle()
    {
        /** @var 要删除的日期 $delete */
        $delete = Carbon::today()->subDays(30)->toDateTimeString();
        $day = Day::where('date',$delete)->first();
        if ($day)
        {
            $blocks = $day->blocks;
            foreach ($blocks as $block)
            {
                $block->delete();
            }
            $day->delete();
        }

        /** @var 要增加的日期 $addition */
        $addition = Carbon::today()->addDays(30)->toDateTimeString();
        $day = Day::where('date',$addition)->first();
        if (!$day)
        {
            $day = Day::create([
                'date' => Carbon::today()->addDays(30)->toDateTimeString(),
            ]);
            $origin = Carbon::createFromTimeString($day->date);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(10)->addMinutes(10)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(3)->addMinutes(10)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);
            Block::create([
                'day_id' => $day->id,
                'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
            ]);

            Log::info('Refresh Executed at '.Carbon::now()->toDateTimeString());
        }

    }
}
