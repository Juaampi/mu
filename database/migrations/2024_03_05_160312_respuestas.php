<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Respuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table)
        {
            $table->bigInteger('id')->unsigned();
                        $table->primary('id');
            $table->string('contenido')->nullable();             
            $table->integer('likes')->nullable();  
            $table->unsignedBigInteger('id_tema');     
            $table->foreign('id_tema')->references('id')->on('temas');
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
