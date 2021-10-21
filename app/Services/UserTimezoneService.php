<?php

namespace App\Services;

class UserTimezoneService
{
    private \DateTimeZone $appTimezone;
    private \DateTimeZone $userTimezone;

    public function __construct()
    {
        $this->appTimezone = new \DateTimeZone(config('app.timezone', 'Asia/Tokyo'));
        $this->userTimezone = $this->appTimezone;
    }

    /**
     * ユーザーのタイムゾーンを設定する
     *
     * @param  string  $timezone
     */
    public function setUserTimezone(string $timezone)
    {
        $this->userTimezone = new \DateTimeZone($timezone);
    }

    /**
     * 現在設定されているユーザーのタイムゾーンを取得する
     *
     * @return string
     */
    public function getUserTimezone(): string
    {
        return $this->userTimezone->getName();
    }

    /**
     * 文字列をユーザーのタイムゾーンの DateTime オブジェクトにパースする
     *
     * @param  string  $datetimeString
     * @return \DateTime
     */
    public function parse($datetimeString): \DateTime
    {
        return new \DateTime($datetimeString, $this->userTimezone);
    }

    /**
     * ユーザーのタイムゾーンで記録されている DateTime オブジェクトを、アプリのタイムゾーンに変換する
     *
     * @param  \DateTime  $userTimezoneDateTime
     * @return \DateTime
     */
    public function toAppTimezone(\DateTime $userTimezoneDateTime)
    {
        return $userTimezoneDateTime->setTimezone($this->appTimezone);
    }

    /**
     * アプリのタイムゾーンで記録されている DateTime オブジェクトを、ユーザーのタイムゾーンに変換する
     *
     * @param  \DateTime  $appTimezoneDateTime
     * @return \DateTime
     */
    public function fromAppTimezone(\DateTime $appTimezoneDateTime)
    {
        return $appTimezoneDateTime->setTimezone($this->userTimezone);
    }
}
