<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_movies', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('lesson_id')->unsigned()->comment('レッスンID');
            $table->string('url')->comment('動画パス');
            $table->integer('sort')->comment('順番');
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
        Schema::dropIfExists('lesson_movies');
    }
}
