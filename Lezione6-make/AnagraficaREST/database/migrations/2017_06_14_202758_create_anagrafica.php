<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnagrafica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anagrafica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ragione_sociale');
            $table->string('indirizzo');
            $table->string('citta');
            $table->string('cap', 5);
            $table->string('provincia');
            $table->string('website');
            $table->enum('tipo',['cliente','fornitore'])->defalut('cliente');
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
        Schema::dropIfExists('anagrafica');
    }
}
