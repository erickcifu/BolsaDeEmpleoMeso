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
        Schema::create('idiomacvs', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('idiomacvId');
            $table->unsignedBigInteger('idioma_id')->nullable();
            $table->unsignedBigInteger('cv_id')->nullable();
            $table->float('nivelIdioma');
            $table->foreign('idioma_id')->references('idiomaId')->on('idiomas')->onDelete(null);
            $table->foreign('cv_id')->references('cvId')->on('cvs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomacvs');
    }
};
