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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained(); 
            $table->foreignId('customer_id')->constrained(); 
            $table->foreignId('company_id')->constrained();
            $table->string('company_name')->constrained();
            $table->string('company_street')->constrained(); 
            $table->integer('company_house_number')->constrained();
            $table->string('company_city')->constrained(); 
            $table->integer('company_country_code')->constrained();
            $table->integer('total_price')->constrained();
            $table->dateTime('date');
            $table->dateTime('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
