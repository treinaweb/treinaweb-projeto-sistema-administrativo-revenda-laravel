<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    /**
     * Define nome da tabela
     *
     * @var string
     */
    protected $table = 'saldo';

    /**
     * define campos para alocação de dados em massa
     *
     * @var array
     */
    protected $fillable = ['valor', 'empresa_id'];

    /**
     * Define relação com movimento de estoque e financeiro
     *
     * @return void
     */
    public function movimento()
    {
        return $this->morphTo();
    }

    /**
     * busca último saldo da empresa
     *
     * @param integer $empresaId
     * @return void
     */
    public static function ultimoDaEmpresa(int $empresaId)
    {
        return self::where('empresa_id', $empresaId)
                    ->latest()
                    ->first();
    }

    /**
     * Busca os saldos de uma empresa por intervalo
     *
     * @param integer $empresa
     * @param string $inicio
     * @param string $fim
     * @return void
     */
    public static function buscaPorIntervalo(int $empresa, string $inicio, string $fim)
    {
        return self::with('movimento')
                    ->whereBetween('created_at', [$inicio, $fim])
                    ->where('empresa_id', $empresa)
                    ->get();
    }
}
