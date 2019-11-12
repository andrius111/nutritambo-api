<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\PessoaEmailRequest;
use Illuminate\Http\Request;
use App\Services\ObterFornecedorCliente;
use App\Services\ObterFiltros;

class PessoaEmailController extends Controller
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
                    ->emails()
                    ->where($this->obterFiltros->obter('PessoaEmail'))
                    ->get();
    }

    /**
     * @param int $cdPessoa
     * @param PessoaEmailRequest $request
     * @return mixed
     */
    public function store($cdPessoa, PessoaEmailRequest $request)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->emails()->create($request->all());
    }

    /**
     * @param int $cdPessoa
     * @param int $cdEmail
     */
    public function show($cdPessoa, $cdEmail)
    {
        return $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->emails->find($cdEmail) ??
               abort(404, 'No query results for model [App\Pessoa\Email] ' . $cdEmail);
    }

    /**
     * @param PessoaEmailRequest $request
     * @param int $cdPessoa
     * @param int $cdEmail
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(PessoaEmailRequest $request, $cdPessoa, $cdEmail)
    {
        $pessoaEmail = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->emails()->find($cdEmail);

        if ($pessoaEmail == null)
            abort(404, 'No query results for model [App\Pessoa\Email] ' . $cdEmail);

        $pessoaEmail->update($request->all());

        return response()->json($pessoaEmail, JsonResponse::HTTP_OK);
    }

    /**
     * @param int $cdPessoa
     * @param int $cdEmail
     * @return JsonResponse
     */
    public function destroy($cdPessoa, $cdEmail)
    {
        $pessoaEmail = $this->fornecedorCliente::findOrFail($cdPessoa)->pessoa->emails()->find($cdEmail);

        if ($pessoaEmail == null)
            abort(404, 'No query results for model [App\Pessoa\Email] ' . $cdEmail);

        $pessoaEmail->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
