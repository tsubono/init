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
            $table->unsignedBigInteger('adviser_user_id')->nullable()->comment('講師ユーザーID');
            $table->unsignedBigInteger('mate_user_id')->nullable()->comment('受講者ユーザーID');
            $table->integer('rate')->comment('評点');
            $table->text('content')->comment('内容');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('adviser_user_id')->references('id')->on('adviser_users');
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
        Schema::dropIfExists('attendance_reviews');
    }
}
