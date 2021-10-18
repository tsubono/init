<?php

namespace Tests\php\Unit;

use PHPUnit\Framework\TestCase;

function convert_timezone ($datetime, $target_timezone = "Asia/Tokyo", $format = 'H:i') {
    $t = new \DateTime($datetime);
    $t->setTimeZone(new \DateTimeZone($target_timezone));
    return $t->format($format);
}

class ConvertTimezoneTest extends TestCase
{
    /**
     * Asia/Tokyo から UTC に変換
     *
     * @return void
     */
    public function test_asia_tokyo_to_utc()
    {
        date_default_timezone_set('Asia/Tokyo');
        $this->assertEquals("12:34", convert_timezone("21:34", "UTC"));
    }
}
