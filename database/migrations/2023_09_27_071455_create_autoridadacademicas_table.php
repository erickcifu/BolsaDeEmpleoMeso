<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoridadAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('autoridadacademicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('autoridadId');
            $table->string('nombreAutoridad',60);
            $table->string('apellidosAutoridad',50);
            $table->boolean('estadoAutoridad')->default(1);
            $table->bigInteger('facultad_id')->unsigned();
            $table->foreign('facultad_id')->references('id')->on('facultads')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('autoridadacademicas');
    }
};
