<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificacionsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('certificacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('certificacionId');
            $table->string('nombreCertificacion',250);
            $table->date('anioCertificacion');
            $table->unsignedBigInteger('cv_id')->unsigned();
            $table->timestamps();
            $table->foreign('cv_id')->references('cvId')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificacions');
    }
};
