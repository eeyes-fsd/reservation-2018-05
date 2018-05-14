<?php

namespace App\Model;
use Carbon\Carbon;

/**
 * Class Day
 * @package App\Model
 *
 * @property int $id
 * @property string $date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Day extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks()
    {
        return $this->hasMany(Block::class,'day_id');
    }

    /**
     * Creator selector
     *
     * @return void
     */
    public function createBlocks()
    {
        $month = Carbon::createFromTimeString($this->date)->month;

        if ($month >= 5 && $month <= 9)
        {
            $this->createSummerBlocks();
        } else {
            $this->createWinterBlocks();
        }
    }
    /**
     * Create the blocks associated to current day
     * With summer time table
     */
    public function createSummerBlocks()
    {
        $origin = Carbon::createFromTimeString($this->date);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(10)->addMinutes(10)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(3)->addMinutes(40)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
    }

    /**
     * Create the blocks associated to current day
     * With winter time table
     */
    public function createWinterBlocks()
    {
        $origin = Carbon::createFromTimeString($this->date);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(10)->addMinutes(10)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(3)->addMinutes(10)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(20)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
        Block::create([
            'day_id' => $this->id,
            'begin_at' => $origin->addHours(00)->addMinutes(30)->toDateTimeString()
        ]);
    }
}
