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
        Schema::create('leases_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leases_id')->constrained();
            $table->foreignId('product_id')->constrained(); 
            $table->string('product_name')->constrained(); 
            $table->decimal('product_price')->constrained(); 
            $table->integer('amount');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leases_products');

    }
};