<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart2TbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart2_tb', function (Blueprint $table) {
            $table->string('bank_id');
            $table->float('value_bqi', 10, 2);
            $table->float('value_care', 10, 2);
            $table->float('value_compared_to_1', 10, 2);
            $table->float('value_compared_to_3', 10, 2);
            $table->date('report_time');
            $table->timestamps();
            $table->primary(['bank_id', 'report_time']);
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
        Schema::dropIfExists('chart2_tb');
    }
}
