<?php

namespace App\Models;

use Carbon\Carbon;
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

    // ============ Attributes ============
    /**
     * @return string
     */
    public function getDatetimeTxtAttribute(): string
    {
        return Carbon::parse($this->datetime)->format('Y/m/d H:i');
    }

    /**
     * @return string
     */
    public function getStatusTxtAttribute(): string
    {
        $statusTxt = '';
        switch ($this->status) {
            case self::STATUS_REQUEST:
                $statusTxt = '受講申請中';
                break;
            case self::STATUS_APPROVAL:
                $statusTxt = '受講中';
                break;
            case self::STATUS_REJECT:
                $statusTxt = '受講否認';
                break;
            case self::STATUS_CANCEL:
                $statusTxt = 'キャンセル';
                break;
            case self::STATUS_REPORT:
                $statusTxt = '通報';
                break;
            case self::STATUS_CLOSED:
                $statusTxt = '受講完了';
                break;
            default:
                break;
        }

        return $statusTxt;
    }

    /**
     * @return string
     */
    public function getStatusClassAttribute(): string
    {
        $statusClass = '';
        switch ($this->status) {
            case self::STATUS_REQUEST:
                $statusClass = 'primary accent';
                break;
            case self::STATUS_APPROVAL:
                $statusClass = 'primary';
                break;
            case self::STATUS_REJECT:
            case self::STATUS_CANCEL:
            case self::STATUS_REPORT:
            case self::STATUS_CLOSED:
            $statusClass = 'default';
                break;
            default:
                break;
        }

        return $statusClass;
    }
}
