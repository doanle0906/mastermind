<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart3Top10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart3_top10', function (Blueprint $table) {
            $table->string('bank_id');
            $table->string('kind');
            $table->string('kws');
            $table->integer('volumn_search');
            $table->date('report_time');
            $table->timestamps();
            $table->primary(['bank_id', 'kind', 'kws', 'report_time']);
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
        Schema::dropIfExists('chart3_top10');
    }
}
