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
            $table->bigIncrements('id')->comment('id');
            $table->string('family_name')->comment('姓');
            $table->string('middle_name')->nullable()->default(null)->comment('ミドルネーム');
            $table->string('first_name')->comment('名');
            $table->string('family_name_kana')->comment('姓 (かな)');
            $table->string('middle_name_kana')->nullable()->default(null)->comment('ミドルネーム (かな)');
            $table->string('first_name_kana')->comment('名 (かな)');
            $table->string('email')->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->default(null)->comment('メールアドレス確認日時');
            $table->string('password')->comment('パスワード');
            $table->string('remember_token')->nullable()->default(null)->comment('リメンバーtoken');
            $table->string('gender')->nullable()->default(null)->comment('性別');
            $table->date('birthday')->comment('生年月日');
            $table->string('tel')->comment('電話番号');
            $table->string('zipcode')->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('skype_name')->nullable()->default(null)->comment('Skype名');
            $table->string('skype_id')->nullable()->default(null)->comment('SkypeID');
            $table->bigInteger('from_country_id')->unsigned()->comment('出身国ID');
            $table->bigInteger('residence_country_id')->unsigned()->comment('居住国ID');
            $table->text('qualification_text')->nullable()->default(null)->comment('保有する資格');
            $table->text('pr_text')->nullable()->default(null)->comment('自己PR');
            $table->string('available_time_monday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (月:start)');
            $table->string('available_time_monday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (月:end)');
            $table->string('available_time_tuesday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (火:start)');
            $table->string('available_time_tuesday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (火:end)');
            $table->string('available_time_wednesday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (水:start)');
            $table->string('available_time_wednesday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (水:end)');
            $table->string('available_time_thursday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (木:start)');
            $table->string('available_time_thursday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (木:end)');
            $table->string('available_time_friday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (金:start)');
            $table->string('available_time_friday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (金:end)');
            $table->string('available_time_saturday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (土:start)');
            $table->string('available_time_saturday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (土:end)');
            $table->string('available_time_sunday_start')->nullable()->default(null)->comment('レッスン可能時間帯 (日:start)');
            $table->string('available_time_sunday_end')->nullable()->default(null)->comment('レッスン可能時間帯 (日:end)');
            $table->text('reason_text')->comment('講師をするきっかけ・理由');
            $table->text('passion_text')->comment('講師をする意気込み');
            $table->string('payment_method')->nullable()->default(null)->comment('支払い方法');
            $table->string('paypal_email')->nullable()->default(null)->comment('paypalメールアドレス');
            $table->string('account_image_1')->nullable()->default(null)->comment('口座画像1');
            $table->string('account_image_2')->nullable()->default(null)->comment('口座画像2');
            $table->integer('coin_amount')->nullable()->default(0)->comment('コイン枚数');
            $table->boolean('can_create_lesson')->nullable()->default(FALSE)->comment('レッスン作成可能フラグ');
            $table->integer('fee_rate')->nullable()->default(null)->comment('マッチングフィー率');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

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
