<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnColumnToMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_languages', function (Blueprint $table) {
            $table->string('name_en')->nullable()->comment('言語名 (英語)');
        });
        Schema::table('mst_categories', function (Blueprint $table) {
            $table->string('name_en')->nullable()->comment('カテゴリ名 (英語)');
        });
        Schema::table('mst_countries', function (Blueprint $table) {
            $table->string('name_en')->nullable()->comment('国名 (英語)');
        });
        Schema::table('mst_rooms', function (Blueprint $table) {
            $table->string('name_en')->nullable()->comment('ルーム名 (英語)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_languages', function (Blueprint $table) {
            $table->dropColumn('name_en')->nullable()->comment('言語名 (英語)');
        });
        Schema::table('mst_categories', function (Blueprint $table) {
            $table->dropColumn('name_en')->nullable()->comment('カテゴリ名 (英語)');
        });
        Schema::table('mst_countries', function (Blueprint $table) {
            $table->dropColumn('name_en')->nullable()->comment('国名 (英語)');
        });
        Schema::table('mst_rooms', function (Blueprint $table) {
            $table->dropColumn('name_en')->nullable()->comment('国名 (英語)');
        });
    }
}
