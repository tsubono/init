<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_mails', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->date('date')->comment('日付');
            $table->string('title')->comment('タイトル');
            $table->text('content')->comment('内容');
            $table->tinyInteger('type')->comment('種別');
            $table->boolean('is_sent')->nullable()->default(FALSE)->comment('送信済みフラグ');
            $table->timestamp('created_at')->nullable()->default(null)->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->default(null)->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_mails');
    }
}
