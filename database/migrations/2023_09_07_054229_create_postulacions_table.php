<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('postulacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
                

            $table->unsignedBigInteger('oferta_id')->nullable();

           $table->foreign('oferta_id')
                  ->references('id')->on('ofertas')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('postulacions');
    }
};
