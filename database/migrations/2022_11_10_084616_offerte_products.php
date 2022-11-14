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
        Schema::create('offerteproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offerte_id')->constrained();
            $table->foreignId('product_id')->constrained(); 
            $table->string('product_name'); 
            $table->decimal('product_price'); 
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerteproducts');
    }
};
