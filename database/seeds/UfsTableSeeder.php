<?php

use Illuminate\Database\Seeder;

class UfsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufs')->delete();

        DB::table('ufs')->insert([
            ['cd_uf' => 1, 'nm_uf' => 'Acre', 'ds_sigla' => 'AC'],
            ['cd_uf' => 2, 'nm_uf' => 'Alagoas', 'ds_sigla' => 'AL'],
            ['cd_uf' => 3, 'nm_uf' => 'Amapá', 'ds_sigla' => 'AP'],
            ['cd_uf' => 4, 'nm_uf' => 'Amazonas', 'ds_sigla' => 'AM'],
            ['cd_uf' => 5, 'nm_uf' => 'Bahia', 'ds_sigla' => 'BA'],
            ['cd_uf' => 6, 'nm_uf' => 'Ceará', 'ds_sigla' => 'CE'],
            ['cd_uf' => 7, 'nm_uf' => 'Distrito Federal', 'ds_sigla' => 'DF'],
            ['cd_uf' => 8, 'nm_uf' => 'Espírito Santo', 'ds_sigla' => 'ES'],
            ['cd_uf' => 9, 'nm_uf' => 'Goiás', 'ds_sigla' => 'GO'],
            ['cd_uf' => 10, 'nm_uf' => 'Maranhão', 'ds_sigla' => 'MA'],
            ['cd_uf' => 11, 'nm_uf' => 'Mato Grosso', 'ds_sigla' => 'MT'],
            ['cd_uf' => 12, 'nm_uf' => 'Mato Grosso do Sul', 'ds_sigla' => 'MS'],
            ['cd_uf' => 13, 'nm_uf' => 'Minas Gerais', 'ds_sigla' => 'MG'],
            ['cd_uf' => 14, 'nm_uf' => 'Pará', 'ds_sigla' => 'PA'],
            ['cd_uf' => 15, 'nm_uf' => 'Paraíba', 'ds_sigla' => 'PB'],
            ['cd_uf' => 16, 'nm_uf' => 'Paraná', 'ds_sigla' => 'PR'],
            ['cd_uf' => 17, 'nm_uf' => 'Pernambuco', 'ds_sigla' => 'PE'],
            ['cd_uf' => 18, 'nm_uf' => 'Piauí', 'ds_sigla' => 'PI'],
            ['cd_uf' => 19, 'nm_uf' => 'Rio de Janeiro', 'ds_sigla' => 'RJ'],
            ['cd_uf' => 20, 'nm_uf' => 'Rio Grande do Norte', 'ds_sigla' => 'RN'],
            ['cd_uf' => 21, 'nm_uf' => 'Rio Grande do Sul', 'ds_sigla' => 'RS'],
            ['cd_uf' => 22, 'nm_uf' => 'Rondônia', 'ds_sigla' => 'RO'],
            ['cd_uf' => 23, 'nm_uf' => 'Roraima', 'ds_sigla' => 'RR'],
            ['cd_uf' => 24, 'nm_uf' => 'Santa Catarina', 'ds_sigla' => 'SC'],
            ['cd_uf' => 25, 'nm_uf' => 'São Paulo', 'ds_sigla' => 'SP'],
            ['cd_uf' => 26, 'nm_uf' => 'Sergipe', 'ds_sigla' => 'SE'],
            ['cd_uf' => 27, 'nm_uf' => 'Tocantins', 'ds_sigla' => 'TO'],
        ]);
    }

}
