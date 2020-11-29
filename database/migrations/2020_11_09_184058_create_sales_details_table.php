<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();  
            $table->bigInteger('sales_id')->unsigned();
            $table->foreign('sales_id')
                    ->references('id')
                    ->on('sales')
                    ->onDelete('Restrict');
            $table->bigInteger('product_stocks_details_id')->unsigned();
            $table->foreign('product_stocks_details_id')
                    ->references('id')
                    ->on('product_stocks_details')
                    ->onDelete('Restrict');
            $table->bigInteger('products_id')->unsigned();
            $table->foreign('products_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('Restrict');
            $table->string('harga_terjual');
            $table->String('products_nama');
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
        Schema::dropIfExists('sales_details');
    }
}
