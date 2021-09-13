<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mate_users', function (Blueprint $table) {
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
            $table->string('skype_name')->nullable()->comment('Skype名');
            $table->string('skype_id')->nullable()->comment('SkypeID');
            $table->string('image_path')->nullable()->comment('アイコン画像パス');
            $table->unsignedBigInteger('from_country_id')->nullable()->comment('出身国ID');
            $table->unsignedBigInteger('residence_country_id')->nullable()->comment('居住国ID');
            $table->text('pr_text')->nullable()->comment('自己PR');
            $table->string('payjp_customer_id')->nullable()->comment('payjp顧客ID');
            $table->boolean('is_notice')->nullable()->default(TRUE)->comment('通知設定');
            $table->boolean('can_apply')->nullable()->default(TRUE)->comment('申し込み可能フラグ');
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
        Schema::dropIfExists('mate_users');
    }
}
