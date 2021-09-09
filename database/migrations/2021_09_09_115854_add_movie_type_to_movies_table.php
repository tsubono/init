<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMovieTypeToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adviser_user_movies', function (Blueprint $table) {
            $table->string('type')->nullable()->after('movie_path')->comment('動画種別');
        });
        Schema::table('lesson_movies', function (Blueprint $table) {
            $table->string('type')->nullable()->after('movie_path')->comment('動画種別');
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
            $table->dropColumn('type');
        });
        Schema::table('lesson_movies', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
