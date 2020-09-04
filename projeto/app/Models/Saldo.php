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
}
