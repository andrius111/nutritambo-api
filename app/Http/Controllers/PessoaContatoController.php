<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Pessoa;
use App\Http\Requests\PessoaContatoRequest;

class PessoaContatoController extends Controller
{
    /**
     * @param Pessoa $pessoa
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Pessoa $pessoa)
    {
        return $pessoa->contatos()->get();
    }

    /**
     * @param Pessoa $pessoa
     * @param PessoaContatoRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Pessoa $pessoa, PessoaContatoRequest $request)
    {
        return $pessoa->contatos()->create($request->all());
    }

    /**
     * @param Pessoa $pessoa
     * @param int $cdContato
     * @return array
     */
    public function show(Pessoa $pessoa, $cdContato)
    {
        return $pessoa->contatos->find($cdContato) ?? [];
    }

    /**
     * @param PessoaContatoRequest $request
     * @param Pessoa $pessoa
     * @param int $cdContato
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(PessoaContatoRequest $request, Pessoa $pessoa, $cdContato)
    {
        $pessoaContato = $pessoa->contatos()->find($cdContato);

        if ($pessoaContato == null)
            throw new \Exception('Contato not found.');

        $pessoaContato->update($request->all());

        return response()->json($pessoaContato, JsonResponse::HTTP_OK);
    }

    /**
     * @param Pessoa $pessoa
     * @param int $cdContato
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Pessoa $pessoa, $cdContato)
    {
        $pessoaContato = $pessoa->contatos()->find($cdContato);

        if ($pessoaContato == null)
            throw new \Exception('Contato not found.');

        $pessoaContato->delete();

        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
