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
        Schema::create('ofertainterpersonals', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('ofertaInterpersonalId');
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->unsignedBigInteger('interpersonal_id')->nullable();
            $table->foreign('oferta_id')->references('ofertaId')->on('ofertas')->onDelete("cascade");
            $table->foreign('interpersonal_id')->references('interpersonalId')->on('interpersonals')->onDelete(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertainterpersonals');
    }
};
