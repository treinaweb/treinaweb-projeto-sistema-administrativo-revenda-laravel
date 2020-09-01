<?php

namespace App\Http\Controllers\Selects;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaNomeTipo extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tipo = $request->tipo === 'entrada' ? 'cliente' : 'fornecedor';
        $nome = $request->nome ?? '';

        return Empresa::buscarPorNomeTipo($nome, $tipo);
    }
}
