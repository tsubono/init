<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_messages', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('attendance_id')->unsigned()->comment('受講ID');
            $table->bigInteger('adviser_user_id')->unsigned()->nullable()->default(null)->comment('講師ユーザーID');
            $table->bigInteger('mate_user_id')->unsigned()->nullable()->default(null)->comment('生徒ユーザーID');
            $table->text('content')->nullable()->default(null)->comment('内容');
            $table->string('file_path_1')->nullable()->default(null)->comment('ファイルパス1');
            $table->string('file_path_2')->nullable()->default(null)->comment('ファイルパス2');
            $table->string('file_path_3')->nullable()->default(null)->comment('ファイルパス3');
            $table->boolean('is_read')->nullable()->default(FALSE)->comment('既読フラグ');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('CASCADE');
            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_messages');
    }
}
