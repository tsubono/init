<?php

namespace App\Models;

use App\Notifications\MateVerifyEmail;
use Carbon\Carbon;
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
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['mateUserCoins', 'languages', 'categories'];

    protected $guarded = ['id'];

    protected $dates = ['last_login_at'];

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

    // ============ Attributes ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
     */
    public function getAvatarImageAttribute()
    {
        return !empty($this->image_path) ? $this->image_path : asset('img/default-avatar.png');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return !is_null($this->middle_name) ?
            "{$this->first_name} {$this->middle_name} {$this->family_name}" : "{$this->first_name} {$this->family_name}";
    }

    /**
     * @return int
     */
    public function getTotalCoinAmountAttribute(): int
    {
        $totalCoinAmount = $this->mateUserCoins->reduce(function ($carry, MateUserCoin $mateUserCoin) {
            return $carry + $mateUserCoin->amount;
        });

        return is_null($totalCoinAmount) ? 0 : $totalCoinAmount;
    }

    /**
     * @return mixed
     */
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

    /**
     * @return mixed
     */
    public function getLanguageIdsAttribute()
    {
        return $this->languages->pluck('id')->toArray();
    }

    /**
     * @return int|string
     */
    public function getBirthdayYearAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->year : '';
    }

    /**
     * @return int|string
     */
    public function getBirthdayMonthAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->month : '';
    }

    /**
     * @return int|string
     */
    public function getBirthdayDayAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->day : '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function infoNotifications()
    {
        return $this->notifications()
            ->where('data->is_information', true)
            ->where('data->date', '<=', now());
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function unreadInfoNotifications()
    {
        return $this->unreadNotifications()
            ->where('data->is_information', true)
            ->where('data->date', '<=', now());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getInfoNotificationsForPopupAttribute()
    {
        return $this->infoNotifications()
            ->take(5)
            ->get();
    }

    /**
     * @return bool
     */
    public function getIsUnreadInfoNotificationAttribute(): bool
    {
        return $this->unreadInfoNotifications()->count() !== 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attendanceNotifications()
    {
        return $this->notifications()
            ->where('data->is_attendance', true);
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function unreadAttendanceNotifications()
    {
        return $this->unreadNotifications()
            ->where('data->is_attendance', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAttendanceNotificationsForPopupAttribute()
    {
        return $this->attendanceNotifications()
            ->take(5)
            ->get();
    }

    /**
     * @return bool
     */
    public function getIsUnreadAttendanceNotificationAttribute(): bool
    {
        return $this->unreadAttendanceNotifications()->count() !== 0;
    }
}
