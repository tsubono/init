<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->string('name')->comment('氏名');
            $table->string('email')->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->default(null)->comment('メールアドレス確認日時');
            $table->string('password')->comment('パスワード');
            $table->string('remember_token')->nullable()->default(null)->comment('リメンバーtoken');
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
        Schema::dropIfExists('admin_users');
    }
}
