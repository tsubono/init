<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_images', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('lesson_id')->unsigned()->comment('レッスンID');
            $table->string('image_path')->comment('画像パス');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_images');
    }
}
