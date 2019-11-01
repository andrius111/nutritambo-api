<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Cidade;
use App\Http\Requests\CidadeRequest;

class CidadeController extends Controller
{
    /**
     * @return Cidade[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Cidade::all();
    }

    /**
     * @param CidadeRequest $request
     * @return mixed
     */
    public function store(CidadeRequest $request)
    {
        return Cidade::create($request->all());
    }

    /**
     * @param Cidade $cidade
     * @return Cidade
     */
    public function show(Cidade $cidade)
    {
        return $cidade;
    }

    /**
     * @param CidadeRequest $request
     * @param Cidade $cidade
     * @return JsonResponse
     */
    public function update(CidadeRequest $request, Cidade $cidade)
    {
        $cidade->update($request->all());

        return response()->json($cidade, JsonResponse::HTTP_OK);
    }

    /**
     * @param Cidade $cidade
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
