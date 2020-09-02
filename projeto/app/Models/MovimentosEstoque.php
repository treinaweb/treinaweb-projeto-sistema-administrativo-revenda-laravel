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
     * Define a relação com produto
     *
     * @return void
     */
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
