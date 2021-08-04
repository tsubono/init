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
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('mate_user_id')->unsigned()->comment('生徒ユーザーID');
            $table->bigInteger('lesson_id')->unsigned()->comment('レッスンID');
            $table->tinyInteger('status')->comment('ステータス');
            $table->text('request_text')->nullable()->default(null)->comment('受講申請メッセージ');
            $table->text('reject_text')->nullable()->default(null)->comment('受講拒否メッセージ');
            $table->bigInteger('cancel_by_user_id')->unsigned()->comment('キャンセルユーザーID');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

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
