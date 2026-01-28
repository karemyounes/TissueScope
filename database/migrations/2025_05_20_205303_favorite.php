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
        Schema::create('favorite', function (Blueprint $table) {
                $table->BigIncrements('FavoriteId');
                $table->unsignedBigInteger('CustomerId');
                $table->unsignedBigInteger('ProductId');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('ProductId')->references('ProductId')->on('product');
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
        Schema::drop('favorite');
    }
};
