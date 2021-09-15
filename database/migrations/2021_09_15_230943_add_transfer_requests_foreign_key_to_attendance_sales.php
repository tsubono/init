<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransferRequestsForeignKeyToAttendanceSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_sales', function (Blueprint $table) {
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
        Schema::table('attendance_sales', function (Blueprint $table) {
            $table->dropForeign('attendance_sales_transfer_request_id_foreign');
        });
    }
}
