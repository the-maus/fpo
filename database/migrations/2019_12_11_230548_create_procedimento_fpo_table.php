<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimentoFpoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimento_fpos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fpo_id')->unsigned();
            $table->bigInteger('procedimento_id')->unsigned();
            $table->foreign('fpo_id')
                ->references('id')->on('fpos')
                ->onDelete('cascade');
            $table->foreign('procedimento_id')
                ->references('id')->on('procedimentos')
                ->onDelete('cascade');
            $table->integer('quantidade');
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
        Schema::dropIfExists('procedimento_fpos');
    }
}
