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
            $table->foreignId('invoice_id')->constrained();
            $table->foreignId('product_id')->constrained(); 
            $table->integer('amount');
            $table->decimal('price_per_product');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_products');
    }
};
