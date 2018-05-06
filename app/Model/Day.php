<?php

namespace App\Model;

/**
 * Class Day
 * @package App\Model
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
}
