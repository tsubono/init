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
            $table->bigIncrements('id')->comment('id');
            $table->string('name')->comment('レッスン名');
            $table->integer('coin_amount')->comment('必要コイン数');
            $table->text('description')->comment('説明');
            $table->bigInteger('mst_language_id')->unsigned()->comment('言語マスターID');
            $table->text('point_text')->comment('必要ポイント');
            $table->boolean('is_stop')->nullable()->default(FALSE)->comment('受講停止フラグ');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');

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
