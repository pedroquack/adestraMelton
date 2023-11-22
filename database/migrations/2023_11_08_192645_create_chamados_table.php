<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('nomeTutor');//Nome do tutor
            $table->string('telefone');//Telefone do tutor
            $table->string('nomeCachorro');//Nome do cachorro
            $table->unsignedBigInteger('breed_id');
            $table->foreign('breed_id')->references('id')->on('breeds');
            $table->double('peso');//Peso do cachorro
            $table->string('idade');//Idade do cachorro
            $table->integer('pessoas');//Quantas pessoas tem na casa
            $table->integer('animais');//Quantos animais tem na casa
            $table->text('descricao');//Descrição do problema que quer resolver
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
        Schema::dropIfExists('chamados');
    }
}
