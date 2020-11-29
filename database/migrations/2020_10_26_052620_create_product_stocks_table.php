<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_po');
            $table->bigInteger('jml');
            $table->bigInteger('suppliers_id')->unsigned();
            $table->foreign('suppliers_id')
                    ->references('id')
                    ->on('suppliers')
                    ->onDelete('Restrict')
                    ->onUpdate('cascade');
            $table->bigInteger('products_id')->unsigned();
            $table->foreign('products_id')
                            ->references('id')
                            ->on('products')
                            ->onDelete('Restrict')
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
        Schema::dropIfExists('product_stocks');
    }
}
