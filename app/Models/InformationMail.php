<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationMail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = ['date'];

    // 全員に通知
    const TYPE_ALL = 1;
    // 通知ONのみ
    const TYPE_ONLY_IS_NOTICE = 2;

    /**
     * @return string
     */
    public function getTypeTxtAttribute(): string
    {
        return $this->type === self::TYPE_ALL ? '全員' : '通知ONのみ';
    }
}
