<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvgSearchVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avg_search_volumes', function (Blueprint $table) {
            $table->string('bank_id');
            $table->string('kws');
            $table->float('value', 10, 2);
            $table->enum('type_data', ['bqi_5b_tb', 'bqi_local_tb', 'bqi_global_tb']);
            $table->timestamps();
            $table->primary(['bank_id', 'kws', 'type_data']);
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
        Schema::dropIfExists('avg_search_volumes');
    }
}
