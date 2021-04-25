<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_od')->unsigned();
            $table->foreign('id_od')
                  ->references('orders_id')
                  ->on('tbl_orders')
                  ->onDelete('cascade');
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')
                  ->references('products_id')
                  ->on('tbl_products');
            $table->integer('amounts');
            $table->date('date');
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
        Schema::dropIfExists('tbl_detail_orders');
    }
}
