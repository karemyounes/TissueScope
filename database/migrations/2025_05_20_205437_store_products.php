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
        Schema::create('store_products', function (Blueprint $table) {
                $table->BigIncrements('Id');
                $table->unsignedBigInteger('StoreId');
                $table->unsignedBigInteger('ProductId');
                $table->integer('Quantity');
                $table->float('BuyingPrice');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('StoreId')->references('StoreId')->on('store');
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
       Schema::drop('store_products');
    }
};
