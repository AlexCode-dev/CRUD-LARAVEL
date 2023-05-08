<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //https://laravel.com/docs/10.x/migrations#column-method-string
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id(); //por default auto-incremental.
            $table->string('titulo');
            $table->string('duracion');
            $table->string('sinopsis');
            $table->string('imagen');
            $table->timestamps();      
            $table->unsignedBigInteger('actor_id')->nullable();            
            $table->foreign('actor_id')->references('id')->on('actors'); //belongs to

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
