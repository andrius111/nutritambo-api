<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\PessoaEnderecoRequest;
use Illuminate\Http\Request;
use App\Services\ObterFornecedorCliente;
use App\Services\ObterFiltros;

class PessoaEnderecoController extends Controller
{
    /** @var \App\Fornecedor|\App\Cliente */
    protected $fornecedorCliente;

    /** @var ObterFiltros */
    protected $obterFiltros;

    /**
     * PessoaContatoController constructor.
     * @param ObterFornecedorCliente $obterFornecedorCliente
     * @param ObterFiltros $obterFiltros
     * @param Request $request
     */
    public function __construct(ObterFornecedorCliente $obterFornecedorCliente, ObterFiltros $obterFiltros, Request $request)
    {
        $this->fornecedorCliente = $obterFornecedorCliente->obterViaRota($request);
        $this->obterFiltros = $obterFiltros;
    }

    /**
     * @param $cdPessoa
     * @return mixed
     * @throws \Exception
     */
    public function index($cdPessoa)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)
                    ->pessoa
                    ->enderecos()
                    ->where($this->obterFiltros->obter('PessoaEndereco'))
                    ->get();
    }

    /**
     * @param int $cdPessoa
     * @param PessoaEnderecoRequest $request
     * @return mixed
     */
    public function store($cdPessoa, PessoaEnderecoRequest $request)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->enderecos()->create($request->all());
    }

    /**
     * @param int $cdPessoa
     * @param int $cdEndereco
     */
    public function show($cdPessoa, $cdEndereco)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->enderecos->find($cdEndereco) ??
               abort(404, 'No query results for model [App\Pessoa\Endereco] ' . $cdEndereco);
    }

    /**
     * @param PessoaEnderecoRequest $request
     * @param int $cdPessoa
     * @param int $cdEndereco
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(PessoaEnderecoRequest $request, $cdPessoa, $cdEndereco)
    {
        $pessoaEndereco = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->enderecos()->find($cdEndereco);

        if ($pessoaEndereco == null)
            abort(404, 'No query results for model [App\Pessoa\Endereco] ' . $cdEndereco);

        $pessoaEndereco->update($request->all());

        return response()->json($pessoaEndereco, JsonResponse::HTTP_OK);
    }

    /**
     * @param int $cdPessoa
     * @param int $cdEndereco
     * @return JsonResponse
     */
    public function destroy($cdPessoa, $cdEndereco)
    {
        $pessoaEndereco = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->enderecos()->find($cdEndereco);

        if ($pessoaEndereco == null)
            abort(404, 'No query results for model [App\Pessoa\Endereco] ' . $cdEndereco);

        $pessoaEndereco->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
