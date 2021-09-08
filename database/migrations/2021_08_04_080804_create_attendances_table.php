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
            $table->unsignedBigInteger('mate_user_id')->comment('メイトユーザーID');
            $table->unsignedBigInteger('adviser_user_id')->comment('アドバイザーユーザーID');
            $table->unsignedBigInteger('lesson_id')->comment('レッスンID');
            $table->tinyInteger('status')->comment('ステータス');
            $table->dateTime('datetime')->nullable()->comment('受講日時');
            $table->text('request_text')->nullable()->comment('受講申請メッセージ');
            $table->text('reject_text')->nullable()->comment('受講拒否メッセージ');
            $table->unsignedBigInteger('cancel_cause_mate_user_id')->comment('キャンセルの起因となったメイトユーザーID')->nullable();
            $table->unsignedBigInteger('cancel_cause_adviser_user_id')->comment('キャンセルの起因となったアドバイザーユーザーID')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('CASCADE');
            $table->foreign('cancel_cause_mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('cancel_cause_adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
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
