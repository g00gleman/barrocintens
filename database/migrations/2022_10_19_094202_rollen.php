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
        Schema::create('rollens', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('admin')->nullable();
            $table->integer('head_finance')->nullable();
            $table->integer('finance')->nullable(); 
            $table->integer('head_maintenance')->nullable();
            $table->integer('maintenance')->nullable();
            $table->integer('head_sales')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('head_inkoop')->nullable();
            $table->integer('inkoop')->nullable();
            $table->integer('klant')->nullable();
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
        Schema::dropIfExists('rollens');
    }
};
