<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviserUserMstLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_user_mst_languages', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('adviser_user_id')->unsigned()->comment('講師ユーザーID');
            $table->bigInteger('mst_language_id')->unsigned()->comment('言語マスターID');

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
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
        Schema::dropIfExists('adviser_user_mst_languages');
    }
}
