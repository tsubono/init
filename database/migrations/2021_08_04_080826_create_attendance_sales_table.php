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
            $table->bigIncrements('id')->comment('id');
            $table->bigInteger('adviser_user_id')->unsigned()->comment('講師ID');
            $table->bigInteger('attendance_id')->unsigned()->comment('受講ID');
            $table->string('name')->comment('レッスン名');
            $table->integer('coin_amount')->comment('必要コイン数');
            $table->text('description')->comment('説明');
            $table->integer('price')->nullable()->default(0)->comment('料金 (=コイン枚数から算出)');
            $table->integer('fee')->nullable()->default(0)->comment('手数料');
            $table->integer('subtotal')->nullable()->default(0)->comment('小計');
            $table->tinyInteger('status')->comment('ステータス');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
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
        Schema::dropIfExists('attendance_sales');
    }
}
