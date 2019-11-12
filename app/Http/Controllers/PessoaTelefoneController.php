<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\PessoaTelefoneRequest;
use Illuminate\Http\Request;
use App\Services\ObterFornecedorCliente;
use App\Services\ObterFiltros;

class PessoaTelefoneController extends Controller
{
    /** @var \App\Fornecedor|\App\Cliente */
    protected $fornecedorCliente;

    /** @var ObterFiltros */
    protected $obterFiltros;

    /**
     * PessoaContatoController constructor.
     * @param ObterFornecedorCliente $obterFornecedorCliente
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
                    ->telefones()
                    ->where($this->obterFiltros->obter('PessoaTelefone'))
                    ->get();
    }

    /**
     * @param int $cdPessoa
     * @param PessoaTelefoneRequest $request
     * @return mixed
     */
    public function store($cdPessoa, PessoaTelefoneRequest $request)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->telefones()->create($request->all());
    }

    /**
     * @param int $cdPessoa
     * @param int $cdTelefone
     */
    public function show($cdPessoa, $cdTelefone)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->telefones->find($cdTelefone) ??
               abort(404, 'No query results for model [App\Pessoa\Telefone] ' . $cdTelefone);
    }

    /**
     * @param PessoaTelefoneRequest $request
     * @param int $cdPessoa
     * @param int $cdTelefone
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(PessoaTelefoneRequest $request, $cdPessoa, $cdTelefone)
    {
        $pessoaTelefone = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->telefones()->find($cdTelefone);

        if ($pessoaTelefone == null)
            abort(404, 'No query results for model [App\Pessoa\Telefone] ' . $cdTelefone);

        $pessoaTelefone->update($request->all());

        return response()->json($pessoaTelefone, JsonResponse::HTTP_OK);
    }

    /**
     * @param int $cdPessoa
     * @param int $cdTelefone
     * @return JsonResponse
     */
    public function destroy($cdPessoa, $cdTelefone)
    {
        $pessoaTelefone = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->telefones()->find($cdTelefone);

        if ($pessoaTelefone == null)
            abort(404, 'No query results for model [App\Pessoa\Telefone] ' . $cdTelefone);

        $pessoaTelefone->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
