<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\PessoaContatoRequest;
use Illuminate\Http\Request;
use App\Services\ObterFornecedorCliente;
use App\Services\ObterFiltros;

class PessoaContatoController extends Controller
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
     * @param int $cdPessoa
     * @return mixed
     * @throws \Exception
     */
    public function index($cdPessoa)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)
                    ->pessoa
                    ->contatos()
                    ->where($this->obterFiltros->obter('PessoaContato'))
                    ->get();
    }

    /**
     * @param int $cdPessoa
     * @param PessoaContatoRequest $request
     * @return mixed
     */
    public function store($cdPessoa, PessoaContatoRequest $request)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->contatos()->create($request->all());
    }

    /**
     * @param int $cdPessoa
     * @param int $cdContato
     */
    public function show($cdPessoa, $cdContato)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->contatos->find($cdContato) ??
               abort(404, 'No query results for model [App\Pessoa\Contato] ' . $cdContato);
    }

    /**
     * @param PessoaContatoRequest $request
     * @param int $cdPessoa
     * @param int $cdContato
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(PessoaContatoRequest $request, $cdPessoa, $cdContato)
    {
        $pessoaContato = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->contatos()->find($cdContato);

        if ($pessoaContato == null)
            abort(404, 'No query results for model [App\Pessoa\Contato] ' . $cdContato);

        $pessoaContato->update($request->all());

        return response()->json($pessoaContato, JsonResponse::HTTP_OK);
    }

    /**
     * @param int $cdPessoa
     * @param int $cdContato
     * @return JsonResponse
     */
    public function destroy($cdPessoa, $cdContato)
    {
        $pessoaContato = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->contatos()->find($cdContato);

        if ($pessoaContato == null)
            abort(404, 'No query results for model [App\Pessoa\Contato] ' . $cdContato);

        $pessoaContato->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
