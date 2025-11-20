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
        Schema::create('invoice', function (Blueprint $table) {
                $table->BigIncrements('InvoiceId');
                $table->unsignedBigInteger('CustomerId');
                $table->unsignedBigInteger('StoreId');
                $table->integer('Quantity');
                $table->string('NumberOfInvoice');
                $table->float('TotalPrice');
                $table->date('Date');
                $table->time('Time');
                $table->boolean('IsCancelled');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('StoreId')->references('StoreId')->on('Store');
                $table->foreign('CustomerId')->references('CustomerId')->on('customer');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice');
    }
};
