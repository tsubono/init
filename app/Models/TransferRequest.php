<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransferRequest
 * @package App\Models
 *
 * status
 * 1: 振り込み待ち
 * 2: 振り込み済み
 * 3: キャンセル
 */
class TransferRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    const STATUS_PROGRESS = 1;
    const STATUS_COMPLETE = 2;
    const STATUS_CANCEL = 3;

    // ============ Relations ============
    /**
     * @return BelongsTo
     */
    public function adviserUser(): BelongsTo
    {
        return $this->belongsTo(AdviserUser::class);
    }
}
