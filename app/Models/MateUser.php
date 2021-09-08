<?php

namespace App\Models;

use App\Notifications\MateVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mateUserCoins(): HasMany
    {
        return $this->hasMany(MateUserCoin::class);
    }

    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(MstLanguage::class);
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(MstCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
