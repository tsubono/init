<?php

namespace App\Models;

use App\Notifications\MateVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MateUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * 認証メール
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new MateVerifyEmail());
    }
}
