<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_telefones', function (Blueprint $table) {
            $table->bigIncrements('cd_telefone');
            $table->unsignedBigInteger('cd_pessoa');
            $table->smallInteger('id_principal')->default(0);
            $table->smallInteger('id_tipo');
            $table->string('nr_telefone', 11);
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
        Schema::dropIfExists('pessoa_telefones');
    }
}
