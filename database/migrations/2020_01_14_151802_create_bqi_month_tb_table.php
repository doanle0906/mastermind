<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBqiMonthTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bqi_month_tb', function (Blueprint $table) {
            $table->string('bank_id');
            $table->string('kws');
            $table->enum('type_data', ["LOCAL", "GLOBAL"]);
            $table->float('value', 10, 2);
            $table->date('report_time');
            $table->timestamps();
            $table->primary(['bank_id', 'kws', 'type_data', 'report_time']);
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bqi_month_tb');
    }
}
