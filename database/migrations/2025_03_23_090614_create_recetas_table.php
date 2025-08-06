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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('tiempo_preparacion');
            $table->string('tiempo_coccion');
            $table->string('porciones');
            $table->string('dificultad');
            $table->json('ingredientes');
            $table->text('instrucciones');
            $table->timestamps();
            $table->string('imagen')->nullable(); 
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
    }
};
