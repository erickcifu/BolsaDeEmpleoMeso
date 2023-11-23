<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()    
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('cvId');
            $table->string('direcionDomiciliar',300);
            $table->string('correoElectronico',100);
            $table->integer('telefonoCv');
            $table->string('fotoCv',300);
            $table->string('perfilProfesional',300);
            $table->string('habilidades',500);
            $table->string('nombreRef1',200);
            $table->integer('telRef1');
            $table->string('nombreRef2',200);
            $table->integer('telRef2');
            $table->string('publicaciones',500);
            $table->string('intereses',500);
            $table->unsignedBigInteger('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('estudianteId')->on('estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down() 
    {
        Schema::dropIfExists('cvs');
    }
};
