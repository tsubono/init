<?php

namespace App\Models;

use App\Notifications\AdviserVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdviserUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

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

    // ============ Attributes ============
    /**
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
     */
    public function getAvatarImageAttribute()
    {
        $image = $this->adviserUserImages()->first();

        return !empty($image) ? $image->image_path : asset('img/default-avatar.png');
    }

    /**
     * birthday (date) から 40〜49歳といったテキスト文言を算出する
     */
    public function getAgeTxtAttribute()
    {
        $birthday = $this->birthday;

        // TODO

        return $birthday;
    }

    /**
     * lessons から 受講メイト数を算出する
     */
    public function getMateCountAttribute()
    {
        $mateCount = 0;
        // TODO: mate_user_idをuniqueにして人数を取得する
        $lessons = $this->lessons;

        return $mateCount;
    }

    /**
     * attendances から キャンセル率を算出する
     * キャンセル判断: attendances.cancel_cause_adviser_user_idが自分のID
     */
    public function getCancelRateAttribute()
    {
        // TODO: 「attandancesの総数 / 自分が原因でキャンセルされたattendancessの総数」で % を 算出
        $cancelRate = 0;
        return $cancelRate;
    }

    /**
     * last_login_at から 最終ログインテキストを生成する
     */
    public function getLastLoginTxtAttribute()
    {
        // TODO:
        /**
         * ・1時間以内の場合は「○○分」(1桁目は0固定)
         * ・1時間以上1日以内の場合は「○○時間」
         * ・1日以上3日以内の場合は「○○日」
         * ・3日以上の場合は「3日以上」
         */
        $lastLoginTxt = '30分';

        return $lastLoginTxt;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return !is_null($this->middle_name) ?
            "{$this->first_name} {$this->middle_name} {$this->family_name}" : "{$this->first_name} {$this->family_name}";
    }
}
