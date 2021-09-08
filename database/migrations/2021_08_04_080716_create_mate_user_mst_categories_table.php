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
        Schema::create('mate_user_mst_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mate_user_id')->comment('メイトユーザーID');
            $table->unsignedBigInteger('mst_category_id')->comment('カテゴリマスターID');

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
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
        Schema::dropIfExists('mate_user_mst_category');
    }
}
