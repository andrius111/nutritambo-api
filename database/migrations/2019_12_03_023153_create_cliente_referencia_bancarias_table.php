<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteReferenciaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_referencias_bancarias', function (Blueprint $table) {
            $table->bigIncrements('cd_cliente_referencia_bancaria');
            $table->unsignedBigInteger('cd_pessoa');
            $table->string('nm_banco', 250);
            $table->string('ds_agencia', 10);
            $table->string('ds_conta', 20);
            $table->string('nm_contato', 250);
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
        Schema::dropIfExists('cliente_referencias_bancarias');
    }
}
