<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_contatos', function (Blueprint $table) {
            $table->bigIncrements('cd_contato');
            $table->unsignedBigInteger('cd_pessoa');
            $table->string('nm_contato', 250);
            $table->string('nr_telefone', 10)->nullable();
            $table->string('nr_celular', 11)->nullable();
            $table->string('ds_email', 250)->nullable();
            $table->foreign('cd_pessoa')->references('cd_pessoa')->on('pessoas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('pessoa_contatos');
    }
}
