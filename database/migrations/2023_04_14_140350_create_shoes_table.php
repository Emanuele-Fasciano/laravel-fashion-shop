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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string("marca", 50);
            $table->string("modello", 50);
            $table->string("colore", 50);
            $table->tinyInteger("taglia");
            $table->float("prezzo", 6, 2);
            $table->float("costo", 6, 2);
            $table->enum("genere", ['uomo', 'donna', 'bambino', 'bambina']);
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
        Schema::dropIfExists('shoes');
    }
};