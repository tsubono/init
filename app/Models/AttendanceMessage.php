<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // ============ Relations ============
    /**
     * @return BelongsTo
     */
    public function adviserUser(): BelongsTo
    {
        return $this->belongsTo(AdviserUser::class);
    }

    /**
     * @return BelongsTo
     */
    public function mateUser(): BelongsTo
    {
        return $this->belongsTo(MateUser::class);
    }

    // ============ Attributes ============
    /**
     * @return mixed
     */
    public function getUserAttribute()
    {
        return !is_null($this->adviser_user_id) ? $this->adviserUser : $this->mateUser;
    }
}
