<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{
    /**
     * Define o nome da tabela
     *
     * @var string
     */
    protected $table = 'movimentos_estoque';

    /**
     * Campos permitidos em definição de dados em massa
     *
     * @var array
     */
    protected $fillable = ['produto_id', 'quantidade', 'valor', 'tipo', 'empresa_id'];

    /**
     * Define a relação com produto
     *
     * @return void
     */
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    /**
     * Configura a relação com histórico do saldo
     *
     * @return void
     */
    public function saldo()
    {
        return $this->MorphOne('App\Models\Saldo', 'movimento');
    }
}
