<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_enderecos', function (Blueprint $table) {
            $table->bigIncrements('cd_endereco');
            $table->unsignedBigInteger('cd_pessoa');
            $table->smallInteger('id_principal')->default(0);
            $table->smallInteger('id_tipo');
            $table->string('ds_endereco', 250);
            $table->integer('nr_endereco')->nullable();
            $table->string('ds_complemento', 250)->nullable();
            $table->string('nm_bairro', 250);
            $table->string('nr_cep', 8);
            $table->unsignedBigInteger('cd_cidade');
            $table->foreign('cd_pessoa')->references('cd_pessoa')->on('pessoas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cd_cidade')->references('cd_cidade')->on('cidades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('pessoa_enderecos');
    }
}
