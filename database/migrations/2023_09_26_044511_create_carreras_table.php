<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('Ncarrera');
            $table->string('EstadoCarrera')->default(1);
            $table->bigInteger('facultad_id')->unsigned();
            $table->timestamps();
            $table->foreign('facultad_id')->references('id')->on('facultads')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
};
