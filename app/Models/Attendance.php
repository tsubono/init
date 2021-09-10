<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attendance
 * @package App\Models
 *
 * status
 * 1: 受講申請 (承認待ち)
 * 2: 受講承認 (受講確定)
 * 3: 受講否認
 * 4: キャンセル
 * 5: キャンセル (通報)
 * 6: 受講完了
 */
class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_REQUEST = 1;
    const STATUS_APPROVAL = 2;
    const STATUS_REJECT = 3;
    const STATUS_CANCEL = 4;
    const STATUS_REPORT = 5;
    const STATUS_CLOSED = 6;

    protected $guarded = ['id'];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mateUser(): BelongsTo
    {
        return $this->belongsTo(MateUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adviserUser(): BelongsTo
    {
        return $this->belongsTo(AdviserUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
