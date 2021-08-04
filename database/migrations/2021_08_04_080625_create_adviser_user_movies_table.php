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
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('adviser_user_id')->unsigned()->comment('講師ユーザーID');
            $table->string('url')->comment('URL');
            $table->integer('sort')->comment('順番');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

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
