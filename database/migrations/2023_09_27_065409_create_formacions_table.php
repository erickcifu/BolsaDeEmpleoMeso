<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('formacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('formacionId');
            $table->date('anioInicioFormacion');
            $table->date('anioFinFormacion');
            $table->string('nivelFormacion',100);
            $table->string('institucionFormacion',250);
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
        Schema::dropIfExists('formacions');
    }
};
