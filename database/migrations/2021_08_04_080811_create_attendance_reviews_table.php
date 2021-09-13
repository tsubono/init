<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attendance_id')->comment('受講ID');
            $table->unsignedBigInteger('lesson_id')->comment('レッスンID');
            $table->unsignedBigInteger('adviser_user_id')->nullable()->comment('アドバイザーユーザーID');
            $table->unsignedBigInteger('mate_user_id')->nullable()->comment('メイトユーザーID');
            $table->integer('rate')->comment('評点');
            $table->text('content')->comment('内容');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('CASCADE');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('CASCADE');
            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
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
        Schema::dropIfExists('attendance_reviews');
    }
}
