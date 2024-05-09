<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Temas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table)
        {
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->string('titulo')->nullable(); 
            $table->string('contenido')->nullable();
            $table->integer('likes')->nullable();  
            $table->unsignedBigInteger('id_categoria');     
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->string('id_usuario');                 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
