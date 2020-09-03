<?php

namespace App\Observers;

use App\Models\Saldo;
use App\Models\MovimentosEstoque;

class MovimentosEstoqueObserver
{
    public function created(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentosEstoque->empresa_id);

        $movimentosEstoque->saldo()->create([
            'valor' => $saldo->valor + ($movimentosEstoque->quantidade*$movimentosEstoque->valor),
            'empresa_id' => $movimentosEstoque->empresa_id
        ]);
    }
}
