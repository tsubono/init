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
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('mate_user_id')->unsigned()->comment('生徒ユーザーID');
            $table->bigInteger('attendance_id')->nullable()->default(null)->comment('受講ID');
            $table->integer('coin_amount')->comment('コイン使用量');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');

            $table->foreign('mate_user_id')->references('id')->on('mate_users')->onDelete('CASCADE');
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
