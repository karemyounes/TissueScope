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
        Schema::create('category', function (Blueprint $table) {
                $table->BigIncrements('CategoryId');
                $table->unsignedBigInteger('BrandId');
                $table->string('CategoryName');
                $table->string('CategoryImage');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('BrandId')->references('BrandId')->on('brand');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
};
