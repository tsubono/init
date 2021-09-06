<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adviser_user_id')->comment('アドバイザーユーザーID');
            $table->string('name')->comment('レッスン名');
            $table->integer('coin_amount')->comment('必要コイン数');
            $table->text('description')->comment('説明');
            $table->unsignedBigInteger('mst_language_id')->comment('言語マスターID');
            $table->text('point_text')->comment('必要ポイント');
            $table->boolean('is_stop')->nullable()->default(FALSE)->comment('受講停止フラグ');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adviser_user_id')->references('id')->on('adviser_users')->onDelete('CASCADE');
            $table->foreign('mst_language_id')->references('id')->on('mst_languages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
