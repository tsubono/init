<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceSale extends Model
{
    use HasFactory, SoftDeletes;

    // 支払い保留 (まだ受講中)
    const STATUS_PENDING = 1;
    // 支払い確定 (受講完了)
    const STATUS_CONFIRMED = 2;
    // 支払い済み
    const STATUS_PAID = 3;

    protected $guarded = ['id'];
}
