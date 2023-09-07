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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa',200);
            $table->integer('nit');
            $table->text('RTU');
            $table->text('patenteDeComercio');
            $table->text('descripcion');
            $table->text('telefonoEmpresa');
            $table->text('correoEmpresa');
            $table->text('direccionEmpresa');
            $table->boolean('estadoEmpresa');
            $table->unsignedBigInteger('user_id')->unique();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
