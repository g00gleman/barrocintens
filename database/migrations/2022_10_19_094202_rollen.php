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
        Schema::create('rollen', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('admin');
            $table->boolean('head_finance');
            $table->boolean('finance'); 
            $table->boolean('head_maintenance');
            $table->boolean('maintenance');
            $table->boolean('head_sales');
            $table->boolean('sales');
            $table->boolean('head_inkoop');
            $table->boolean('inkoop');
            $table->boolean('klant');
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
        Schema::dropIfExists('rollen');
    }
};
