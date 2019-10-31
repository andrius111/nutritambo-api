<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\UfRequest;
use App\Uf;

class UfController extends Controller
{
    /**
     * @return Uf[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Uf::all();
    }

    /**
     * @param UfRequest $request
     * @return mixed
     */
    public function store(UfRequest $request)
    {
        return Uf::create($request->all());
    }

    /**
     * @param Uf $uf
     * @return Uf
     */
    public function show(Uf $uf)
    {
        return $uf;
    }

    /**
     * @param UfRequest $request
     * @param Uf $uf
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UfRequest $request, Uf $uf)
    {
        $uf->update($request->all());

        return response()->json($uf, JsonResponse::HTTP_OK);
    }

    /**
     * @param Uf $uf
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Uf $uf)
    {
        $uf->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
