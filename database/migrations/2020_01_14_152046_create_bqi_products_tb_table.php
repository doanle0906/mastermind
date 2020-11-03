<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBqiProductsTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bqi_products_tb', function (Blueprint $table) {
            $table->string('type_product');
            $table->string('product');
            $table->date('report_time');
            $table->float('value', 10, 2);
            $table->timestamps();
            $table->primary(['type_product', 'product', 'report_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bqi_products_tb');
    }
}
