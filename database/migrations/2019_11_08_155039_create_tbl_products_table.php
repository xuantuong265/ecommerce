<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->Increments('products_id');
            $table->string('products_name');
            $table->double('products_price');
            $table->integer('products_amount');
            $table->text('products_desc');
            $table->integer('id_b')->unsigned();
            $table->foreign('id_b')
                  ->references('id')
                  ->on('tbl_brand')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('tbl_products');
    }
}
