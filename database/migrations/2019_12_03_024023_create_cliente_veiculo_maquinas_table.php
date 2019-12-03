<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteVeiculoMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_veiculos_maquinas', function (Blueprint $table) {
            $table->bigIncrements('cd_cliente_veiculo_maquina');
            $table->unsignedBigInteger('cd_pessoa');
            $table->string('ds_item', 250);
            $table->decimal('vl_veiculo_maquina', 15, 2)->nullable();
            $table->string('ds_modelo', 250)->nullable();
            $table->string('dt_ano', 4)->nullable();
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
        Schema::dropIfExists('cliente_veiculos_maquinas');
    }
}
