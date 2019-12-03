<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_fornecedores', function (Blueprint $table) {
            $table->unsignedBigInteger('cd_cliente');
            $table->unsignedBigInteger('cd_fornecedor');
            $table->primary(['cd_cliente', 'cd_fornecedor']);
            $table->foreign('cd_cliente')->references('cd_pessoa')->on('clientes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cd_fornecedor')->references('cd_pessoa')->on('fornecedores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('cliente_fornecedores');
    }
}
