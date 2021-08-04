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
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('attendance_id')->unsigned()->comment('受講ID');
            $table->bigInteger('adviser_user_id')->unsigned()->nullable()->default(null)->comment('講師ユーザーID');
            $table->bigInteger('mate_user_id')->unsigned()->nullable()->default(null)->comment('生徒ユーザーID');
            $table->integer('rate')->comment('評点');
            $table->text('content')->comment('内容');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('CASCADE');
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
