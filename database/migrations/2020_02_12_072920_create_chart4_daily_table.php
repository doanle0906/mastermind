<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart4DailyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart4_daily', function (Blueprint $table) {
            $table->string('bank_id');
            $table->float('value',10,2);
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
        Schema::dropIfExists('chart4_daily');
    }
}
