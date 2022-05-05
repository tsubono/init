<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class MstCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $appends = [
        'name_locale',
    ];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room (): BelongsTo {
        return $this->belongsTo(MstRoom::class, 'mst_room_id');
    }

    // ============ Attributes ============
    /**
     * 多言語対応した名称
     *
     * @return string
     */
    public function getNameLocaleAttribute(): string
    {
        return App::isLocale('en') ? $this->name_en : $this->name;
    }
}
