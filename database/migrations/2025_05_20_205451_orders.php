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
        Schema::create('orders', function (Blueprint $table) {
                $table->BigIncrements('OrderId');
                $table->string('OrderNumber');
                $table->integer('Quantity');
                $table->boolean('IsOrder');
                $table->float('TotalPrice');
                $table->boolean('Status');
                $table->date('Date');
                $table->time('Time');
                $table->timestamps();
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
};
