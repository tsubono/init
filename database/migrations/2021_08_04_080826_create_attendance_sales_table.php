<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adviser_user_id')->comment('講師ID');
            $table->unsignedBigInteger('attendance_id')->comment('受講ID');
            $table->string('name')->comment('レッスン名');
            $table->integer('coin_amount')->comment('必要コイン数');
            $table->text('description')->comment('説明');
            $table->integer('price')->nullable()->default(0)->comment('料金 (=コイン枚数から算出)');
            $table->integer('fee')->nullable()->default(0)->comment('手数料');
            $table->integer('subtotal')->nullable()->default(0)->comment('小計');
            $table->tinyInteger('status')->comment('ステータス');
            $table->unsignedBigInteger('transfer_request_id')->comment('振り込申請ID')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users');
            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('transfer_request_id')->references('id')->on('transfer_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_sales');
    }
}
