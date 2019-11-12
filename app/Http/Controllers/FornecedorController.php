<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Pessoa;
use App\Http\Requests\FornecedorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\ObterFiltros;

class FornecedorController extends Controller
{
    /** @var ObterFiltros */
    protected $obterFiltros;

    /**
     * PessoaContatoController constructor.
     * @param ObterFiltros $obterFiltros
     * @param Request $request
     */
    public function __construct(ObterFiltros $obterFiltros)
    {
        $this->obterFiltros = $obterFiltros;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        return Fornecedor::where($this->obterFiltros->obter('Fornecedor'))->get();
    }

    /**
     * @param FornecedorRequest $request
     * @return mixed
     */
    public function store(FornecedorRequest $request)
    {
        $pessoa = Pessoa::create($request->all());
        $fornecedor = Fornecedor::create(['cd_pessoa' => $pessoa->cd_pessoa]);

        return $fornecedor::find($pessoa->cd_pessoa);
    }

    /**
     * @param Fornecedor $fornecedor
     * @return Fornecedor
     */
    public function show(Fornecedor $fornecedor)
    {
        return $fornecedor;
    }

    /**
     * @param FornecedorRequest $request
     * @param Fornecedor $fornecedor
     * @return JsonResponse
     */
    public function update(FornecedorRequest $request, Fornecedor $fornecedor)
    {
        $fornecedor->pessoa()->update($request->all());

        return response()->json(Fornecedor::find($fornecedor->cd_pessoa), JsonResponse::HTTP_OK);
    }

    /**
     * @param Fornecedor $fornecedor
     * @return JsonResponse
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->update(['id_ativo' => 0]);

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
