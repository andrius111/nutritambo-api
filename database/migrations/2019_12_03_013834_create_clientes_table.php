<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('cd_pessoa');
            $table->smallInteger('id_ativo')->default(1);
            $table->date('dt_abertura');
            $table->smallInteger('id_regime_tributario');
            $table->unsignedBigInteger('cd_atividade');
            $table->decimal('vl_capital_registrado', 15, 2)->nullable();
            $table->decimal('vl_capital_integralizado', 15, 2)->nullable();
            $table->date('dt_inicio_atividade')->nullable();
            $table->integer('qt_funcionarios')->nullable();
            $table->decimal('vl_faturamento_mensal', 15, 2)->nullable();
            $table->decimal('vl_limite_credito', 15, 2)->nullable();
            $table->decimal('vl_despesa_mensal', 15, 2)->nullable();
            $table->decimal('vl_folha_pagamento', 15, 2)->nullable();
            $table->decimal('vl_compra_mensal', 15, 2)->nullable();
            $table->decimal('qt_estoque', 15, 2)->nullable();
            $table->decimal('vl_outra_renda', 15, 2)->nullable();
            $table->integer('qt_prazo_medio')->nullable();
            $table->foreign('cd_atividade')->references('cd_atividade')->on('atividades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('clientes');
    }
}
