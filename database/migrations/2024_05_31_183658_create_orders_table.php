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
            $table->id();
            $table->timestamps();
            $table->string('product_title');
            $table->string('product_description');
            $table->double('price');
            $table->string('buyer_email');
            $table->string('buyer_name_lastname');
            $table->string('buyer_id');
            $table->string('seller_email');
            $table->string('seller_name_lastname');
            $table->string('seller_id');
            $table->string('city');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
