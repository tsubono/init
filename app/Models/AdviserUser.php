<?php

namespace App\Models;

use App\Facades\UserTimezone;
use App\Notifications\AdviserVerifyEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class AdviserUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = [
        'adviserUserImages',
        'adviserUserPersonalInfos',
        'adviserUserMovies',
    ];

    protected $guarded = ['id'];

    protected $appends = [
        'avatar_image',
        'full_name',
        'available_times',
    ];

    protected $dates = ['last_login_at'];

    /**
     * 認証メール
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new AdviserVerifyEmail());
    }

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adviserUserImages(): HasMany
    {
        return $this->hasMany(AdviserUserImage::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adviserUserPersonalInfos(): HasMany
    {
        return $this->hasMany(AdviserUserPersonalInfo::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adviserUserMovies(): HasMany
    {
        return $this->hasMany(AdviserUserMovie::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(AttendanceReview::class);
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
     * @return BelongsTo
     */
    public function fromCountry(): BelongsTo
    {
        return $this->belongsTo(MstCountry::class, 'from_country_id');
    }

    /**
     * @return BelongsTo
     */
    public function residenceCountry(): BelongsTo
    {
        return $this->belongsTo(MstCountry::class, 'residence_country_id');
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

    /**
     * @return HasMany
     */
    public function transferRequests(): HasMany
    {
        return $this->hasMany(TransferRequest::class);
    }


    // ============ Attributes ============
    /**
     * アバター画像
     *
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
     */
    public function getAvatarImageAttribute()
    {
        $image = $this->adviserUserImages()->first();

        return !empty($image) ? $image->image_path : asset('img/default-avatar.png');
    }

    /**
     * レッスン可能時間をユーザーのタイムゾーンに合わせたもの
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAvailableTimesAttribute () {
        $days = [
            'monday' => '月',
            'tuesday' => '火',
            'wednesday' => '水',
            'thursday' => '木',
            'friday' => '金',
            'saturday' => '土',
            'sunday' => '日'
        ];

        $localized = collect();

        foreach ($days as $day => $dayText) {
            $start = $this["available_time_{$day}_start"] ? UserTimezone::fromAppTimezone(new \DateTime($this["available_time_{$day}_start"]))->format('H:i') : '';
            $end = $this["available_time_{$day}_end"] ? UserTimezone::fromAppTimezone(new \DateTime($this["available_time_{$day}_end"]))->format('H:i') : '';

            $localized[] = compact("day", "dayText", "start", "end");
        }

        return $localized;
    }

    /**
     * birthday (date) から 40〜49歳といったテキスト文言を算出する
     */
    public function getAgeTxtAttribute()
    {
        $ageTxt = null;
        $age = Carbon::parse($this->birthday)->age;

        switch($age) {
            case $age <= 19:
                $ageTxt = '〜19歳';
                break;
            case $age <= 29:
                $ageTxt = '20〜29歳';
                break;
            case $age <= 39:
                $ageTxt = '30〜39歳';
                break;
            case $age <= 49:
                $ageTxt = '40〜49歳';
                break;
            case $age <= 59:
                $ageTxt = '50〜59歳';
                break;
            case $age <= 69:
                $ageTxt = '60〜69歳';
                break;
            case $age <= 79:
                $ageTxt = '70〜79歳';
                break;
            case $age <= 89:
                $ageTxt = '80〜89歳';
                break;
            case $age <= 99:
                $ageTxt = '90〜99歳';
                break;
            case $age <= 109:
                $ageTxt = '100〜109歳';
                break;
        };

        return $ageTxt;
    }

    /**
     * lessons から 受講受講者数を算出する
     */
    public function getMateCountAttribute()
    {
        $lessonIds = $this->lessons->pluck('id')->toArray();

        return $this->attendances
                          ->whereIn('lesson_id', $lessonIds)
                          ->unique('mate_user_id')
                          ->count();
    }

    /**
     * attendances から キャンセル率を算出する
     * キャンセル判断: attendances.cancel_cause_adviser_user_idが自分のID
     */
    public function getCancelRateAttribute()
    {
        $attendanceCount = $this->attendances->count();
        $cancelCount = $this->attendances->where('cancel_cause_adviser_user_id', $this->id)->count();

        return $cancelCount === 0 ? 0 : round($cancelCount / $attendanceCount * 100);
    }

    /**
     * last_login_at から 最終ログインテキストを生成する
     */
    public function getLastLoginTxtAttribute()
    {
        /**
         * ・1時間以内の場合は「○○分」(1桁目は0固定)
         * ・1時間以上1日以内の場合は「○○時間」
         * ・1日以上3日以内の場合は「○○日」
         * ・3日以上の場合は「3日以上」
         */
        $diffDate = Carbon::now()->diff($this->last_login_at);
        $lastLoginTxt = '未ログイン';

        // dayが1日以上ある場合
        if ($diffDate->d >= 1) {
            $lastLoginTxt = $diffDate->d >= 3
                ? '3日以上前'
                : $diffDate->d . '日前ログイン';
        }

        // dayは0日、hourが1時間以上ある場合
        if ($diffDate->d === 0 && $diffDate->h >= 1) {
            $lastLoginTxt = $diffDate->h . '時間前ログイン';
        }

        // dayは0日、hourが0時間、minutesが1分以上ある場合
        if ($diffDate->d === 0 && $diffDate->h === 0 && $diffDate->i >= 1) {
            $minutes = ceil($diffDate->i / 10) * 10;
            $lastLoginTxt = $minutes === 60
                ? '1時間前ログイン'
                : $minutes . '分前ログイン';
        }

        return $lastLoginTxt;
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
     * 紐づくカテゴリID配列
     *
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
     * 個人情報 (表面)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPersonalInfoFrontAttribute(): Collection
    {
        return $this->adviserUserPersonalInfos()
            ->where('type', '表面')
            ->get();
    }

    /**
     * 個人情報 (裏面)
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPersonalInfoBackAttribute(): Collection
    {
        return $this->adviserUserPersonalInfos()
            ->where('type', '裏面')
            ->get();
    }

    /**
     * 公開中のレッスン
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOpenLessonsAttribute()
    {
        return $this->lessons()
            ->where('is_stop', false)
            ->get();
    }

    /**
     * レッスンを公開できるかどうか
     *
     * @return false
     */
    public function getCanOpenLessonAttribute(): bool
    {
        $canOpenLesson = true;

        foreach ($this->getRequiredColumns() as $column) {
            if (empty($this->$column)) {
                $canOpenLesson = false;
                break;
            }
        }
        if ($this->categories()->count() == 0) {
            $canOpenLesson = false;
        }
        if ($this->languages()->count() == 0) {
            $canOpenLesson = false;
        }
        if ($this->adviserUserPersonalInfos()->count() == 0) {
            $canOpenLesson = false;
        }

        return $canOpenLesson;
    }

    /**
     * レッスン公開のためにプロフィール登録必須な項目を取得する
     *
     * @return string[]
     */
    private function getRequiredColumns()
    {
        return [
          'family_name',
          'first_name',
          'family_name_kana',
          'first_name_kana',
          'birthday',
          'tel',
          'zipcode',
          'address',
          'email',
          'skype_name',
          'skype_id',
          'from_country_id',
          'residence_country_id',
          'reason_text',
          'passion_text',
          'password',
        ];
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
     * 振り込み待ちの振り込み申請があるかどうか
     *
     * @return bool
     */
    public function getHasActiveTransferRequestAttribute()
    {
        return $this->transferRequests()
            ->where('status', TransferRequest::STATUS_PROGRESS)
            ->exists();
    }
}
