<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class MstRoom extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $appends = [
        'name_locale',
    ];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(MstCategory::class);
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
