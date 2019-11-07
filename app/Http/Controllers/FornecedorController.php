<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Pessoa;
use App\Http\Requests\FornecedorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\Exception;

class FornecedorController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $arrFiltros = [];

        if ($request->get('id_ativo') !== null)
        {
            if (!in_array($request->get('id_ativo'), [0, 1]))
                throw new Exception('id_ativo deve ser 0 ou 1');

            $arrFiltros['id_ativo'] = $request->get('id_ativo');
        }

        return Fornecedor::where($arrFiltros)->get();
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
