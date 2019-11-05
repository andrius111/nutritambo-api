<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {

            // Insere pessoa
            DB::table('pessoas')->insert([
                'nm_pessoa' => $faker->name,
                'nm_fantasia' => $faker->name,
                'nm_razao_social' => $faker->name,
                'nr_cpf_cnpj' => substr($faker->creditCardNumber, 0, 11),
                'ds_observacao' => $faker->sentence,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Insere contatos
            for ($j = 1; $j <= 10; $j++) {
                DB::table('pessoa_contatos')->insert([
                    'cd_pessoa' => $i,
                    'nm_contato' => $faker->name,
                    'ds_email' => $faker->email,
                    'nr_telefone' => substr($faker->creditCardNumber, 0, 10),
                    'nr_celular' => substr($faker->creditCardNumber, 0, 11),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Insere emails
            for ($j = 1; $j <= 10; $j++) {
                DB::table('pessoa_emails')->insert([
                    'cd_pessoa' => $i,
                    'ds_email' => $faker->email,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Insere telefones
            for ($j = 1; $j <= 10; $j++) {
                DB::table('pessoa_telefones')->insert([
                    'cd_pessoa' => $i,
                    'id_tipo' => 1,
                    'nr_telefone' => substr($faker->creditCardNumber, 0, 11),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Insere enderecos
            for ($j = 1; $j <= 10; $j++) {
                DB::table('pessoa_enderecos')->insert([
                    'cd_pessoa' => $i,
                    'id_tipo' => 1,
                    'ds_endereco' => $faker->address,
                    'nr_endereco' => $faker->randomNumber(),
                    'ds_complemento' => $faker->name,
                    'nm_bairro' => $faker->name,
                    'nr_cep' => $faker->randomNumber(8),
                    'cd_cidade' => rand(1, 200),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
