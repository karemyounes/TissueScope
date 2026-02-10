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
        Schema::create('store', function (Blueprint $table) {
                $table->BigIncrements('StoreId');
                $table->string('StoreName');
                $table->string('StoreAddress');
                $table->string('StorePhone');
                $table->string('StoreCode');
                $table->boolean('IsBranch');
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
        Schema::drop('store');      
    }
};
