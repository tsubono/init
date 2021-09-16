<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateUserCoin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mateUser(): BelongsTo
    {
        return $this->belongsTo(MateUser::class);
    }
}
