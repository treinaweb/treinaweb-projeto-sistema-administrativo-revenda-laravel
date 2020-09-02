<?php

namespace App\Http\Controllers\Selects;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class produtoPorNome extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $nome = $request->nome ?? '';

        return Produto::buscarPorNome($nome);
    }
}
