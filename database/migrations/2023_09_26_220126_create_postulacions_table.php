<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('postulacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('postulacionId');
            $table->date('fechaPostulacion');
            $table->boolean('estadoPostulacion')->default(0);
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->timestamps();
            $table->foreign('oferta_id')->references('ofertaId')->on('ofertas')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('estudianteId')->on('estudiantes')->onDelete('cascade');
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
