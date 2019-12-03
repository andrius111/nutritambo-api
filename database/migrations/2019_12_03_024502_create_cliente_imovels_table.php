<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_imoveis', function (Blueprint $table) {
            $table->bigIncrements('cd_cliente_imovel');
            $table->unsignedBigInteger('cd_pessoa');
            $table->string('ds_item', 250);
            $table->decimal('vl_imovel', 15, 2)->nullable();
            $table->decimal('qt_area', 15, 2)->nullable();
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
        Schema::dropIfExists('cliente_imoveis');
    }
}
