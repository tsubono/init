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

    protected $softCascade = ['mateUserCoins'];

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


    // ============ Attributes ============
    /**
     * アバター画像
     *
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
     */
    public function getAvatarImageAttribute()
    {
        return !empty($this->image_path) ? $this->image_path : asset('img/default-avatar.png');
    }

    /**
     * フルネーム
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return !is_null($this->middle_name) ?
            "{$this->first_name} {$this->middle_name} {$this->family_name}" : "{$this->first_name} {$this->family_name}";
    }

    /**
     * 総保有コイン数
     *
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
     * 紐づくカテゴリID配列
     * @return mixed
     */
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

    /**
     * 紐づく言語ID配列
     *
     * @return mixed
     */
    public function getLanguageIdsAttribute()
    {
        return $this->languages->pluck('id')->toArray();
    }

    /**
     * 誕生年
     *
     * @return int|string
     */
    public function getBirthdayYearAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->year : '';
    }

    /**
     * 誕生月
     *
     * @return int|string
     */
    public function getBirthdayMonthAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->month : '';
    }

    /**
     * 誕生日
     *
     * @return int|string
     */
    public function getBirthdayDayAttribute()
    {
        return !is_null($this->birthday) ? Carbon::parse($this->birthday)->day : '';
    }

    /**
     * ポップアップ表示用のお知らせ通知を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getInfoNotificationsForPopupAttribute()
    {
        return $this->infoNotifications()
            ->take(5)
            ->get();
    }

    /**
     * 未読のお知らせ通知があるかどうか
     *
     * @return bool
     */
    public function getIsUnreadInfoNotificationAttribute(): bool
    {
        return $this->unreadInfoNotifications()->count() !== 0;
    }

    /**
     * ポップアップ表示用の受講通知を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAttendanceNotificationsForPopupAttribute()
    {
        return $this->attendanceNotifications()
            ->take(5)
            ->get();
    }

    /**
     * 未読の受講通知があるかどうか
     *
     * @return bool
     */
    public function getIsUnreadAttendanceNotificationAttribute(): bool
    {
        return $this->unreadAttendanceNotifications()->count() !== 0;
    }

    /**
     * 受講申請中もしくは受講中のレッスンがあるかどうか
     *
     * @return bool
     */
    public function getHasActiveAttendanceAttribute(): bool
    {
        return $this->attendances()
            ->whereIn('status', [Attendance::STATUS_REQUEST, Attendance::STATUS_APPROVAL])
            ->exists();
    }
}
