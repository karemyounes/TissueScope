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
        Schema::create('invoice_products', function (Blueprint $table) {
                $table->BigIncrements('Id');
                $table->unsignedBigInteger('InvoiceId');
                $table->unsignedBigInteger('ProductId');
                $table->float('Price');
                $table->integer('Quantity');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('InvoiceId')->references('InvoiceId')->on('Invoice');
                $table->foreign('ProductId')->references('ProductId')->on('Product');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_products');
    }
};
