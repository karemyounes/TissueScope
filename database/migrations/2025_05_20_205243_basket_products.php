<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('basket_products', function (Blueprint $table) {
                $table->BigIncrements('Id');
                $table->unsignedBigInteger('ProductId');
                $table->unsignedBigInteger('BasketId');
                $table->float('Price');
                $table->integer('Quantity');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('ProductId')->references('ProductId')->on('product');
                $table->foreign('BasketId')->references('BasketId')->on('basket');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('basket_products');
    }
};
