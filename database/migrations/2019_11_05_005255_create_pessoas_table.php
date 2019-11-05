<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('cd_pessoa');
            $table->string('nm_pessoa', 250);
            $table->string('nm_fantasia', 250)->nullable();
            $table->string('nm_razao_social', 250)->nullable();
            $table->string('nr_cpf_cnpj', 14);
            $table->string('nr_inscricao_estadual', 50)->nullable();
            $table->text('ds_observacao')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
}
