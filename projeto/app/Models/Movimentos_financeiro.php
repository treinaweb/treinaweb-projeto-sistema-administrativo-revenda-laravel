<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentos_financeiro extends Model
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
    protected $fillable = ['descricao', 'valor', 'data', 'tipo', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
    
}
