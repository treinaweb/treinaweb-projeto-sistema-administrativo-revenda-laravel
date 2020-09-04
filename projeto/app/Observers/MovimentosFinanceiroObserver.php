<?php

namespace App\Observers;

use App\Models\Saldo;
use App\Models\MovimentosFinanceiro;

class MovimentosFinanceiroObserver
{
    public function created(MovimentosFinanceiro $movimentosFinanceiro)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentosFinanceiro->empresa_id);

        $valorSaldo = $saldo->valor ?? 0;

        $movimentosFinanceiro->saldo()->create([
            'valor' => $valorSaldo - ($movimentosFinanceiro->valor),
            'empresa_id' => $movimentosFinanceiro->empresa_id
        ]);
    }

    public function deleted(MovimentosFinanceiro $movimentosFinanceiro)
    {
        $saldo = $movimentosFinanceiro->saldo;
        $valorMovimento = $movimentosFinanceiro->valor;

        Saldo::where('created_at', '>', $saldo->created_at)
                ->update([
                    'valor' => \DB::raw("valor + $valorMovimento")
                ]);
        
        $saldo->delete();
    }
}
