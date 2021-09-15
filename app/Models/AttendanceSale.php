<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AttendanceSale
 * @package App\Models
 *
 * status
 * 1: 売上保留 (まだ受講中)
 * 2: 売上確定 (受講完了)
 * 3: 売上振り込み申請済み
 * 4: 売上振り込済み
 */
class AttendanceSale extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_PENDING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_REQUEST = 3;
    const STATUS_TRANSFERRED = 4;

    protected $guarded = ['id'];

    // ============ Relations ============
    /**
     * @return BelongsTo
     */
    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

    /**
     * @return BelongsTo
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

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
    public function transferRequest(): BelongsTo
    {
        return $this->belongsTo(TransferRequest::class);
    }
}
