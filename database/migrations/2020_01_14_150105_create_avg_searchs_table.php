<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvgSearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avg_searchs', function (Blueprint $table) {
            $table->string('bank_id');
            $table->string('type_search');
            $table->float('value', 10, 2);
            $table->enum("type_data", ["bqi_5b_bb", "bqi_local_bb", "bqi_global_bb"]);
            $table->timestamps();
            $table->primary(['bank_id', 'type_search', 'type_data']);
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
        Schema::dropIfExists('avg_searchs');
    }
}
