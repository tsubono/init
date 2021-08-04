<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateUserMstCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mate_user_mst_categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('mate_user_id')->unsigned()->comment('生徒ユーザーID');
            $table->bigInteger('mst_category_id')->unsigned()->comment('カテゴリマスターID');

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('mst_category_id')->references('id')->on('mst_countries')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mate_user_mst_categories');
    }
}
