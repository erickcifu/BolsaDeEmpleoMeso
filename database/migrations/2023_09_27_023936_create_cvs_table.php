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
            $table->string('referencias',300);
            $table->string('publicaciones',500);
            $table->string('intereses',500);
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
