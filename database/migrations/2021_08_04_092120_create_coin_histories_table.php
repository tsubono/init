<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mate_user_id')->comment('生徒ユーザーID');
            $table->unsignedBigInteger('attendance_id')->nullable()->comment('受講ID');
            $table->integer('coin_amount')->comment('コイン使用量');
            $table->timestamps();

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_histories');
    }
}
