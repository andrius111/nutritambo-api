<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Fornecedor;

class ObterFornecedorCliente
{
    public function obterViaRota(Request $request)
    {
        if ($request->is('*/fornecedores/*'))
            return new Fornecedor;
    }
}
