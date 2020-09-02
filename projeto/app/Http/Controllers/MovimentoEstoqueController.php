<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimentosEstoque;
use App\Http\Requests\MovimentoEstoqueRequest;

class MovimentoEstoqueController extends Controller
{
    /**
     * Cria movimento de estoque
     *
     * @param MovimentoEstoqueRequest $request
     * @return void
     */
    public function store(MovimentoEstoqueRequest $request)
    {
        $dados = $request->all();
        $dados['tipo'] = 'entrada';

        MovimentosEstoque::create($dados);

        return \redirect()->back();
    }

    /**
     * Apaga movimento de estoque
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        MovimentosEstoque::destroy($id);

        return \redirect()->back();
    }
}
