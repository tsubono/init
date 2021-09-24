<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mate_user_id')->comment('受講者ユーザーID');
            $table->unsignedBigInteger('adviser_user_id')->comment('講師ユーザーID');
            $table->unsignedBigInteger('lesson_id')->comment('レッスンID');
            $table->unsignedBigInteger('mate_user_coin_id')->comment('受講者ユーザーコインID');
            $table->tinyInteger('status')->comment('ステータス');
            $table->dateTime('datetime')->nullable()->comment('受講日時');
            $table->text('request_text')->nullable()->comment('受講申請メッセージ');
            $table->text('reject_text')->nullable()->comment('受講拒否メッセージ');
            $table->unsignedBigInteger('cancel_cause_mate_user_id')->comment('キャンセルの起因となった受講者ユーザーID')->nullable();
            $table->unsignedBigInteger('cancel_cause_adviser_user_id')->comment('キャンセルの起因となった講師ユーザーID')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users');
            $table->foreign('mate_user_id')->references('id')->on('mate_users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('mate_user_coin_id')->references('id')->on('mate_user_coins');
            $table->foreign('cancel_cause_mate_user_id')->references('id')->on('mate_users');
            $table->foreign('cancel_cause_adviser_user_id')->references('id')->on('adviser_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
