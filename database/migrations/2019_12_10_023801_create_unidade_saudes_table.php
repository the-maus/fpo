<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_saudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_cnes');
            $table->string('nome');
            $table->string('endereco');
            $table->string('diretor_clinico');
            $table->enum('horario_funcionamento', array_keys(\App\UnidadeSaude::$horarios_funcionamento));
            $table->enum('natureza_juridica', array_keys(\App\UnidadeSaude::$naturezas_juridicas));
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
        Schema::dropIfExists('unidade_saudes');
    }
}
