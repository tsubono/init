<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonMstCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_mst_categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('lesson_id')->unsigned()->comment('レッスンID');
            $table->bigInteger('mst_category_id')->unsigned()->comment('カテゴリマスターID');

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('CASCADE');
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
        Schema::dropIfExists('lesson_mst_categories');
    }
}
