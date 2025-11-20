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
        Schema::create('mortg3at', function (Blueprint $table) {
                $table->BigIncrements('Id');
                $table->unsignedBigInteger('InvoiceId');
                $table->unsignedBigInteger('ProductId');
                $table->float('Price');
                $table->integer('Quantity');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('ProductId')->references('ProductId')->on('product');
                $table->foreign('InvoiceId')->references('InvoiceId')->on('invoice');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mortg3at');
    }
};
