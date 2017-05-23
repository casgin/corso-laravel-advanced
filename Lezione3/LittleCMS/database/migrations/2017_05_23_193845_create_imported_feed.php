<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportedFeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imported_feed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->dateTime('pub_date');
            $table->text('description');
            $table->string('link', 255);
            $table->string('brand', 50);
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
        Schema::dropIfExists('imported_feed');
    }
}
