<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEyeCatchPathToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adviser_user_movies', function (Blueprint $table) {
            $table->string('eye_catch_path')->nullable()->after('movie_path')->comment('アイキャッチ画像');
        });
        Schema::table('lesson_movies', function (Blueprint $table) {
            $table->string('eye_catch_path')->nullable()->after('movie_path')->comment('アイキャッチ画像');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adviser_user_movies', function (Blueprint $table) {
            $table->dropColumn('eye_catch_path');
        });
        Schema::table('lesson_movies', function (Blueprint $table) {
            $table->dropColumn('eye_catch_path');
        });
    }
}
