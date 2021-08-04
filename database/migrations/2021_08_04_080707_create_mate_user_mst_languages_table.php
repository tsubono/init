<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateUserMstLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mate_user_mst_languages', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('mate_user_id')->unsigned()->comment('生徒ユーザーID');
            $table->bigInteger('mst_language_id')->unsigned()->comment('言語マスターID');

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('mst_language_id')->references('id')->on('mst_languages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mate_user_mst_languages');
    }
}
