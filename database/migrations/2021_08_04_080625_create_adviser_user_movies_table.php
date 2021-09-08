<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviserUserMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_user_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adviser_user_id')->comment('アドバイザーユーザーID');
            $table->string('movie_path')->comment('動画パス');
            $table->integer('sort')->comment('順番')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adviser_user_movies');
    }
}
