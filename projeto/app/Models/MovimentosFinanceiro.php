<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosFinanceiro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movimentos_financeiros';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao', 'valor', 'tipo', 'empresa_id'];

    /**
     * Método responsável pela relação com a empresa
     *
     * @return void
     */
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
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

    /**
     * Busca movimentos por intervalo de data
     *
     * @param string $inicio
     * @param string $fim
     * @param integer $quantidade
     * @return void
     */
    public static function buscaPorIntervalo(string $inicio, string $fim, int $quantidade = 20)
    {
        return self::whereBetween('created_at', [$inicio, $fim])
                        ->with(['empresa' => function($q){
                            $q->withTrashed();
                        }])
                        ->paginate($quantidade);
    }

    /**
     * Busca movimento por id e tras empresa mesmo que excluida
     *
     * @param integer $id
     * @return void
     */
    public static function porIdComEmpresaExcluida(int $id)
    {
        return self::with(['empresa' => function($q){
                            $q->withTrashed();
                        }])
                        ->findOrFail($id);
    }
}
