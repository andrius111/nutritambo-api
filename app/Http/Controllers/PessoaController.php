<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Pessoa;
use App\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    /**
     * @return Pessoa[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Pessoa::all();
    }

    /**
     * @param PessoaRequest $request
     * @return mixed
     */
    public function store(PessoaRequest $request)
    {
        return Pessoa::create($request->all());
    }

    /**
     * @param Pessoa $pessoa
     * @return Pessoa
     */
    public function show(Pessoa $pessoa)
    {
        return $pessoa;
    }

    /**
     * @param PessoaRequest $request
     * @param Pessoa $pessoa
     * @return JsonResponse
     */
    public function update(PessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());

        return response()->json($pessoa, JsonResponse::HTTP_OK);
    }

    /**
     * @param Pessoa $pessoa
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
