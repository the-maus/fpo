<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fpos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unidade_saude_id')->unsigned();
            $table->bigInteger('procedimento_id')->unsigned();
            $table->foreign('unidade_saude_id')
                ->references('id')->on('unidade_saudes')
                ->onDelete('cascade');
            $table->foreign('procedimento_id')
                ->references('id')->on('procedimentos')
                ->onDelete('cascade');
            $table->integer('quantidade');
            $table->integer('nivel_apuracao');
            $table->date('cmpt_ini');
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
        Schema::dropIfExists('fpos');
    }
}
