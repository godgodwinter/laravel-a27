<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_stocks_id')->unsigned();
            $table->foreign('product_stocks_id')
                    ->references('id')
                    ->on('product_stocks')
                    ->onDelete('Restrict ')
                    ->onUpdate('cascade');
            $table->string('harga_modal');
            $table->string('harga_jual');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks_details');
    }
}
