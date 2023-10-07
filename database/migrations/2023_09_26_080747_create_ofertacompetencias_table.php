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
        Schema::create('ofertacompetencias', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('ofertaCompentenciaId');
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->unsignedBigInteger('competencia_id')->nullable();
            $table->foreign('oferta_id')->references('ofertaId')->on('ofertas')->onDelete("cascade");
            $table->foreign('competencia_id')->references('competenciaId')->on('competencias')->onDelete(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertacompetencias');
    }
};
