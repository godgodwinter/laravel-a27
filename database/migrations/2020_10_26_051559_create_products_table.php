<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('sku');
            $table->string('harga_modal');
            $table->string('harga_jual');
            $table->bigInteger('product_categories_id')->unsigned();
            $table->foreign('product_categories_id')
                    ->references('id')
                    ->on('product_categories')
                    ->onDelete('Restrict ')
                    ->onUpdate('cascade');
            $table->bigInteger('product_units_id')->unsigned();
            $table->foreign('product_units_id')
                    ->references('id')
                    ->on('product_units')
                    ->onDelete('Restrict ')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
