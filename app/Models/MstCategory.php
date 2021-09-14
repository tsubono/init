<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MstCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room (): BelongsTo {
        return $this->belongsTo(MstRoom::class, 'mst_room_id');
    }
}
