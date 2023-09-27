<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     */
    public function up(): void
    {
        Schema::create('ofertatecnicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('ofertaTecnicaId');
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->unsignedBigInteger('tecnica_id')->nullable();
            $table->foreign('oferta_id')->references('ofertaId')->on('ofertas')->onDelete("cascade");
            $table->foreign('tecnica_id')->references('tecnicaId')->on('habilidadtecnicas')->onDelete(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertatecnicas');
    }
};
