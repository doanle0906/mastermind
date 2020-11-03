<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBqiProductsBbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bqi_products_bb', function (Blueprint $table) {
            $table->string('bank_id');
            $table->string('type_product');
            $table->float('value', 10, 2);
            $table->timestamps();
            $table->primary(['bank_id', 'type_product']);
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
        Schema::dropIfExists('bqi_products_bb');
    }
}
