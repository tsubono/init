<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviserUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_users', function (Blueprint $table) {
            $table->id();
            $table->string('family_name')->comment('姓');
            $table->string('middle_name')->nullable()->comment('ミドルネーム');
            $table->string('first_name')->comment('名');
            $table->string('family_name_kana')->comment('姓 (かな)');
            $table->string('middle_name_kana')->nullable()->comment('ミドルネーム (かな)');
            $table->string('first_name_kana')->comment('名 (かな)');
            $table->string('email')->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メールアドレス確認日時');
            $table->string('password')->comment('パスワード');
            $table->string('remember_token')->nullable()->comment('リメンバーtoken');
            $table->string('gender')->nullable()->comment('性別');
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('zipcode')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->string('skype_name')->nullable()->comment('Skype名');
            $table->string('skype_id')->nullable()->comment('SkypeID');
            $table->unsignedBigInteger('from_country_id')->nullable()->comment('出身国ID');
            $table->unsignedBigInteger('residence_country_id')->nullable()->comment('居住国ID');
            $table->text('qualification_text')->nullable()->comment('保有する資格');
            $table->text('pr_text')->nullable()->comment('自己PR');
            $table->string('available_time_monday_start')->nullable()->comment('レッスン可能時間帯 (月:start)');
            $table->string('available_time_monday_end')->nullable()->comment('レッスン可能時間帯 (月:end)');
            $table->string('available_time_tuesday_start')->nullable()->comment('レッスン可能時間帯 (火:start)');
            $table->string('available_time_tuesday_end')->nullable()->comment('レッスン可能時間帯 (火:end)');
            $table->string('available_time_wednesday_start')->nullable()->comment('レッスン可能時間帯 (水:start)');
            $table->string('available_time_wednesday_end')->nullable()->comment('レッスン可能時間帯 (水:end)');
            $table->string('available_time_thursday_start')->nullable()->comment('レッスン可能時間帯 (木:start)');
            $table->string('available_time_thursday_end')->nullable()->comment('レッスン可能時間帯 (木:end)');
            $table->string('available_time_friday_start')->nullable()->comment('レッスン可能時間帯 (金:start)');
            $table->string('available_time_friday_end')->nullable()->comment('レッスン可能時間帯 (金:end)');
            $table->string('available_time_saturday_start')->nullable()->comment('レッスン可能時間帯 (土:start)');
            $table->string('available_time_saturday_end')->nullable()->comment('レッスン可能時間帯 (土:end)');
            $table->string('available_time_sunday_start')->nullable()->comment('レッスン可能時間帯 (日:start)');
            $table->string('available_time_sunday_end')->nullable()->comment('レッスン可能時間帯 (日:end)');
            $table->text('reason_text')->nullable()->comment('講師をするきっかけ・理由');
            $table->text('passion_text')->nullable()->comment('講師をする意気込み');
            $table->string('payment_method')->nullable()->comment('支払い方法');
            $table->string('paypal_email')->nullable()->comment('paypalメールアドレス');
            $table->string('account_image_1')->nullable()->comment('口座画像1');
            $table->string('account_image_2')->nullable()->comment('口座画像2');
            $table->integer('fee_rate')->nullable()->comment('マッチングフィー率');
            $table->timestamp('last_login_at')->nullable()->comment('最終ログイン日時');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('from_country_id')->references('id')->on('mst_countries')->onDelete('CASCADE');
            $table->foreign('residence_country_id')->references('id')->on('mst_countries')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adviser_users');
    }
}
