<?php

namespace App\Observers;

use App\Models\Saldo;
use App\Models\MovimentosEstoque;

class MovimentosEstoqueObserver
{
    public function created(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentosEstoque->empresa_id);

        $valorSaldo = $saldo->valor ?? 0;

        $movimentosEstoque->saldo()->create([
            'valor' => $valorSaldo + ($movimentosEstoque->quantidade*$movimentosEstoque->valor),
            'empresa_id' => $movimentosEstoque->empresa_id
        ]);
    }

    public function deleted(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = $movimentosEstoque->saldo;
        $valorMovimento = $movimentosEstoque->quantidade*$movimentosEstoque->valor;

        Saldo::where('created_at', '>', $saldo->created_at)
                ->update([
                    'valor' => \DB::raw("valor - $valorMovimento")
                ]);
        
        $saldo->delete();
    }
}
