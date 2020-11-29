<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();   
            $table->bigInteger('customers_id')->unsigned();
            $table->foreign('customers_id')
                    ->references('id')
                    ->on('customers')
                    ->onDelete('Restrict');
            $table->dateTime('tgl_penjualan');
            $table->bigInteger('total_bayar');
            $table->bigInteger('pembayaran_tunai');
            $table->float('diskon', 8, 2);
            $table->string('harus_dibayar');
            $table->string('pengembalian');
            $table->string('total_diskon');
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
        Schema::dropIfExists('sales');
    }
}
