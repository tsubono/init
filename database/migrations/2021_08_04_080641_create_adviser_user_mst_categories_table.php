<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviserUserMstCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_user_mst_categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('adviser_user_id')->unsigned()->comment('講師ユーザーID');
            $table->bigInteger('mst_category_id')->unsigned()->comment('カテゴリマスターID');

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
            $table->foreign('mst_category_id')->references('id')->on('mst_categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adviser_user_mst_categories');
    }
}
