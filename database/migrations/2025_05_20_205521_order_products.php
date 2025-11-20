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
        Schema::create('order_products', function (Blueprint $table) {
                $table->BigIncrements('Id');
                $table->unsignedBigInteger('OrderId');
                $table->unsignedBigInteger('ProductId');
                $table->string('Quantity');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('OrderId')->references('OrderId')->on('orders');
                $table->foreign('ProductId')->references('ProductId')->on('product');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_products');
    }
};
