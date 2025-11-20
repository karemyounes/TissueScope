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
        Schema::create('basket', function (Blueprint $table) {
                $table->BigIncrements('BasketId');
                $table->unsignedBigInteger('CustomerId');
                $table->float('TotalPrice');
                $table->boolean('Status');
                $table->integer('NumberOfProducts');
                $table->date('Date');
                $table->time('Time');
                $table->timestamps();
                $table->softDeletes();

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
        Schema::drop('basket');
    }
};
