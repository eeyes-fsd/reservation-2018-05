<?php

namespace App\Model;

/**
 * Class Block
 * @package App\Model
 *
 * @property int $id
 * @property int $status
 * @property string $beginning_at
 * @property string $finishing_at
 * @property string $created_at
 * @property string $updated_at
 */
class Block extends Model
{
    protected $table = 'block';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function day()
    {
        return $this->belongsTo(Day::class,'day_id');
    }
}
