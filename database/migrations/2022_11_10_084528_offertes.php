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
        Schema::create('offertes', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('achternaam');
            $table->string('bedrijfnaam');
            $table->string('email')->unique();
            $table->string('telefoonnummer')->unique();
            $table->string('land');
            $table->string('stad');
            $table->string('straat');
            $table->string('huisnummer');
            $table->integer('check')->nullable();
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
        Schema::dropIfExists('offertes');
    }
};
