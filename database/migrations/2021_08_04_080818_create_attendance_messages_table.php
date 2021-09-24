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
            $table->id();
            $table->unsignedBigInteger('attendance_id')->comment('受講ID');
            $table->unsignedBigInteger('adviser_user_id')->nullable()->comment('講師ユーザーID');
            $table->unsignedBigInteger('mate_user_id')->nullable()->comment('受講者ユーザーID');
            $table->text('content')->nullable()->comment('内容');
            $table->string('file_path_1')->nullable()->comment('ファイルパス1');
            $table->string('file_path_2')->nullable()->comment('ファイルパス2');
            $table->string('file_path_3')->nullable()->comment('ファイルパス3');
            $table->boolean('is_read')->nullable()->default(FALSE)->comment('既読フラグ');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users');
            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('mate_user_id')->references('id')->on('mate_users');
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
