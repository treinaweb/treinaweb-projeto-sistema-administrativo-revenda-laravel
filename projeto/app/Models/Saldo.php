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
}
