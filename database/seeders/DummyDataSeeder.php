<?php

namespace Database\Seeders;

use App\Models\AdviserUser;
use App\Models\AdviserUserImage;
use App\Models\AdviserUserMovie;
use App\Models\AdviserUserPersonalInfo;
use App\Models\Attendance;
use App\Models\AttendanceReview;
use App\Models\AttendanceSale;
use App\Models\Information;
use App\Models\Lesson;
use App\Models\LessonImage;
use App\Models\LessonMovie;
use App\Models\MateUser;
use App\Models\MateUserCoin;
use App\Models\MstCategory;
use App\Models\MstLanguage;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AdviserUser::factory(3)
            ->has(
                Lesson::factory()
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://www.youtube.com/watch?v=57wtrBtPma4",
                        "type" => "youtube",
                    ]))
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://vimeo.com/83949049",
                        "type" => "vimeo",
                    ]))
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://twitter.com/ccchisa76/status/1436271453263958021?ref_src=twsrc%5Etfw",
                        "type" => "twitter",
                    ]))
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Frugbyworldcupjp%2Fvideos%2F361483822288928%2F&show_text=false&width=476&t=0",
                        "type" => "fb",
                    ]))
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://www.instagram.com/p/CTgPLBEBbAr/?utm_source=ig_embed&amp;utm_campaign=loading",
                        "type" => "instagram",
                    ]))
                    ->has(LessonMovie::factory([
                        "movie_path" => "https://www.tiktok.com/@meeeeeeeu/video/7000386946027490562",
                        "type" => "tiktok",
                    ]))
                    ->count(5)
            )
            ->has(AdviserUserImage::factory()->count(3))
            ->has(AdviserUserPersonalInfo::factory()->count(3))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://www.youtube.com/watch?v=57wtrBtPma4",
                "type" => "youtube",
            ]))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://vimeo.com/83949049",
                "type" => "vimeo",
            ]))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://twitter.com/ccchisa76/status/1436271453263958021?ref_src=twsrc%5Etfw",
                "type" => "twitter",
            ]))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Frugbyworldcupjp%2Fvideos%2F361483822288928%2F&show_text=false&width=476&t=0",
                "type" => "fb",
            ]))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://www.instagram.com/p/CTgPLBEBbAr/?utm_source=ig_embed&amp;utm_campaign=loading",
                "type" => "instagram",
            ]))
            ->has(AdviserUserMovie::factory([
                "movie_path" => "https://www.tiktok.com/@meeeeeeeu/video/7000386946027490562",
                "type" => "tiktok",
            ]))
            ->create()->each(function ($adviserUser) {
                $categoryIds = MstCategory::all()->random(3)->pluck('id')->toArray();
                $adviserUser->categories()->sync($categoryIds);
                $languageIds = MstLanguage::all()->random(3)->pluck('id')->toArray();
                $adviserUser->languages()->sync($languageIds);
            });

        Lesson::all()->each(function ($lesson) {
            $categoryIds = MstCategory::all()->random(3)->pluck('id')->toArray();
            $lesson->categories()->sync($categoryIds);

            LessonImage::factory(['lesson_id' => $lesson->id])->count(3)->create();
        });

        MateUser::factory(3)
            ->has(MateUserCoin::factory()->count(5)
            )->create()->each(function ($mateUser) {
                $categoryIds = MstCategory::all()->random(3)->pluck('id')->toArray();
                $mateUser->categories()->sync($categoryIds);
                $languageIds = MstLanguage::all()->random(3)->pluck('id')->toArray();
                $mateUser->languages()->sync($languageIds);

                $lesson = Lesson::all()->random();
                $mateUserCoin = MateUserCoin::create([
                    'mate_user_id' => $mateUser->id,
                    'amount' => -$lesson->coin_amount,
                    'note' => "{$lesson->name}の受講に使用"
                ]);
                $attendance = Attendance::create([
                    'adviser_user_id' => $lesson->adviserUser->id,
                    'mate_user_id' => $mateUser->id,
                    'lesson_id' => $lesson->id,
                    'mate_user_coin_id' => $mateUserCoin->id,
                    'status' => array_rand([1, 2]),
                    'datetime' => $this->getRandomDateTime('2021-8-1', '2021-9-10'),
                    'request_text' => '受講申請メッセージテキスト受講申請メッセージテキスト受講申請メッセージテキスト',
                ]);
                AttendanceSale::create([
                    'adviser_user_id' => $lesson->adviserUser->id,
                    'attendance_id' => $attendance->id,
                    'name' => $lesson->name,
                    'coin_amount' => $lesson->coin_amount,
                    'description' => $lesson->description,
                    'price' => $lesson->coin_amount * 100,
                    'subtotal' => $lesson->coin_amount * 100,
                    'status' => 1,
                ]);
                AttendanceReview::factory([
                    'attendance_id' => $attendance->id,
                    'lesson_id' => $lesson->id,
                    'mate_user_id' => $attendance->mateUser->id,
                ])->count(1)->create();
            });

        foreach (config('const.info_categories') as $category) {
            Information::factory([
                'category' => $category,
            ])->count(3)->create();
        }
    }

    /**
     * @param $start_date
     * @param $end_date
     * @return false|string
     */
    private function getRandomDateTime($start_date, $end_date)
    {
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        $val = rand($min, $max);

        return date('Y-m-d H:i:s', $val);
    }
}
