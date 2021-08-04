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
            $table->date('birthday')->nullable()->default(null)->comment('生年月日');
            $table->string('tel')->nullable()->default(null)->comment('電話番号');
            $table->string('skype_name')->nullable()->default(null)->comment('Skype名');
            $table->string('skype_id')->nullable()->default(null)->comment('SkypeID');
            $table->string('image_path')->nullable()->default(null)->comment('アイコン画像パス');
            $table->bigInteger('from_country_id')->nullable()->default(null)->comment('出身国ID');
            $table->bigInteger('residence_country_id')->nullable()->default(null)->comment('居住国ID');
            $table->text('pr_text')->nullable()->default(null)->comment('自己PR');
            $table->integer('coin_amount')->nullable()->default(0)->comment('コイン枚数');
            $table->boolean('is_notice')->nullable()->default(TRUE)->comment('通知設定');
            $table->boolean('can_apply')->nullable()->default(TRUE)->comment('申し込み可能フラグ');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');
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
