<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mst_room_id')->nullable()->comment('ルームID');
            $table->string('icon_path')->comment('アイコンパス');
            $table->string('name')->comment('カテゴリ名');

            $table->foreign('mst_room_id')->references('id')->on('mst_rooms')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_categories');
    }
}
