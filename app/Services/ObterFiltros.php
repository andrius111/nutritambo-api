<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObterFiltros
{
    /** @var Request */
    protected $request;

    /** @var array */
    protected $filtrosPermitidos;

    /**
     * ObterFiltros constructor.
     * @param Request $request
     * @throws \Exception
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->filtrosPermitidos = [
            // Fornecedor
            'Fornecedor' => [
                'id_ativo',
            ],

            // Pessoa Endereco
            'PessoaEndereco' => [
                'id_tipo',
                'id_principal',
            ],

            // Pessoa Contato
            'PessoaContato' => [
                'nm_contato',
                'nr_telefone',
                'nr_celular',
                'ds_email',
            ],

            // Pessoa Email
            'PessoaEmail' => [
                'id_principal',
                'id_nfe',
                'ds_email',
            ],

            // Pessoa Telefone
            'PessoaTelefone' => [
                'id_principal',
                'id_tipo',
                'nr_telefone',
            ],
        ];
    }

    /**
     * @param $model
     * @return array
     * @throws \Exception
     */
    public function obter($model)
    {
        if ($model == '')
            return [];

        $filtros = [];

        foreach ($this->filtrosPermitidos[$model] as $campo) {
            $valor = $this->request->get($campo);

            if ($valor !== null)
                $filtros[$campo] = is_numeric($valor) ? (int)$valor : $valor;
        }

        $validador = Validator::make($filtros, [
            'id_ativo' => 'integer|between:0,1',
            'id_tipo' => 'integer',
            'id_principal' => 'integer|between:0,1',
            'id_nfe' => 'integer|between:0,1',
            'ds_email' => 'email',
            'nm_contato' => 'max:250',
            'nr_telefone' => 'min:10|max:10',
            'nr_celular' => 'min:11|max:11',
        ]);

        if ($validador->fails())
            throw new \Exception($validador->errors());

        return $filtros;
    }
}
