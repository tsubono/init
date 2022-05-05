<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class MstCountry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $appends = [
        'name_locale',
    ];

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
