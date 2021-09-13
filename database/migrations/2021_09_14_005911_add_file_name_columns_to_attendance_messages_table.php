<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileNameColumnsToAttendanceMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_messages', function (Blueprint $table) {
            $table->string('file_name_1')->nullable()->after('file_path_1')->comment('ファイル名1');
            $table->string('file_name_2')->nullable()->after('file_path_2')->comment('ファイル名2');
            $table->string('file_name_3')->nullable()->after('file_path_3')->comment('ファイル名3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_messages', function (Blueprint $table) {
            $table->dropColumn('file_name_1');
            $table->dropColumn('file_name_2');
            $table->dropColumn('file_name_3');
        });
    }
}
