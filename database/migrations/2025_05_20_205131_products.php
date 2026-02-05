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
        Schema::create('product', function (Blueprint $table) {
                $table->BigIncrements('ProductId');
                $table->unsignedBigInteger('CategoryId');
                $table->string('ProductName')->unique();
                $table->string('Description');
                $table->float('BuyingPrice');
                $table->float('SellingPrice');
                $table->string('Barcode')->unique();
                $table->string('ProductImage');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('CategoryId')->references('CategoryId')->on('category');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
};
