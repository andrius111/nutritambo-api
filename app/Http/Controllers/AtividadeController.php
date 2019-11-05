<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Atividade;
use App\Http\Requests\AtividadeRequest;

class AtividadeController extends Controller
{
    /**
     * @return Atividade[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Atividade::all();
    }

    /**
     * @param AtividadeRequest $request
     * @return mixed
     */
    public function store(AtividadeRequest $request)
    {
        return Atividade::create($request->all());
    }

    /**
     * @param Atividade $atividade
     * @return Atividade
     */
    public function show(Atividade $atividade)
    {
        return $atividade;
    }

    /**
     * @param AtividadeRequest $request
     * @param Atividade $atividade
     * @return JsonResponse
     */
    public function update(AtividadeRequest $request, Atividade $atividade)
    {
        $atividade->update($request->all());

        return response()->json($atividade, JsonResponse::HTTP_OK);
    }

    /**
     * @param Atividade $atividade
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Atividade $atividade)
    {
        $atividade->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
