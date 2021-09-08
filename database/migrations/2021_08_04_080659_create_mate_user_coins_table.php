<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateUserCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mate_user_coins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mate_user_id')->comment('メイトユーザーID');
            $table->integer('amount')->comment('数量');
            $table->string('payment_id')->comment('決済ID')->nullable();
            $table->date('expiration_date')->comment('有効期限')->nullable();
            $table->text('note')->comment('備考')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('mate_user_coins');
    }
}
