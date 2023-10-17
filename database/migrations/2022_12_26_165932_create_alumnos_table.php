<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50);
            
            // Llave foranea llamada "id_carrera" de la tabla carreras, que se actualice automaticamente e impedira
            // la eliminacion si ya esta siendo utilizada en algun alumno
            $table->foreignId('id_carrera')->constrained('carreras')->onUpdate('cascade')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
