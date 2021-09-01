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
            $table->unsignedBigInteger('mate_user_id')->comment('生徒ユーザーID');
            $table->unsignedBigInteger('lesson_id')->comment('レッスンID');
            $table->tinyInteger('status')->comment('ステータス');
            $table->text('request_text')->nullable()->comment('受講申請メッセージ');
            $table->text('reject_text')->nullable()->comment('受講拒否メッセージ');
            $table->unsignedBigInteger('cancel_by_user_id')->comment('キャンセルユーザーID');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('CASCADE');
            $table->foreign('cancel_by_user_id')->references('id')->on('admin_users')->onDelete('CASCADE');
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
