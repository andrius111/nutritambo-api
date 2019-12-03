<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteComposicaoAcionariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_composicao_acionarias', function (Blueprint $table) {
            $table->bigIncrements('cd_cliente_composicao_acionaria');
            $table->unsignedBigInteger('cd_pessoa');
            $table->string('nm_pessoa', 250);
            $table->string('nr_cpf', 11);
            $table->decimal('pr_percentual', 15, 2);
            $table->foreign('cd_pessoa')->references('cd_pessoa')->on('clientes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('cliente_composicao_acionarias');
    }
}
