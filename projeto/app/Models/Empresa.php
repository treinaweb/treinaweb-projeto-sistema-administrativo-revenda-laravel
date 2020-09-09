<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo', 'nome', 'razao_social', 'documento', 'ie_rg', 'nome_contato', 'celular', 'email', 'telefone', 'cep', 'logradouro', 'bairro', 'cidade', 'estado', 'observacao'];

    /**
     * Define dados para serialização
     *
     * @var array
     */
    protected $visible = ['id', 'text'];

    /**
     * anexa acessores a serialização
     *
     * @var array
     */
    protected $appends = ['text'];

    /**
     * Define a relação com estoque
     *
     * @return void
     */
    public function movimentosEstoque()
    {
        return $this->hasMany('App\Models\MovimentosEstoque');
    }

    /**
     * retorna empresas por tipo
     *
     * @param string $tipo
     * @param integer $quantidade
     * @return AbstractPaginator
     */
    public static function todasPorTipo(string $tipo, string $busca, int $quantidade=10): AbstractPaginator
    {
        //where tipo = 'fornecedor' and (nome LIKE '%elton%' or razao_social LIKE '%elton%' or nome_contato LIKE '%elton%')
        
        return self::where('tipo', $tipo)
                    ->where(function($q) use($busca) {
                        $q->orWhere('nome', 'LIKE', "%$busca%")
                            ->orWhere('razao_social', 'LIKE', "%$busca%")
                            ->orWhere('nome_contato', 'LIKE', "%$busca%");
                    })
                    ->paginate($quantidade);

    }

    /**
     * Busca empresa por nome e tipo
     *
     * @param string $nome
     * @param string $tipo
     * @return void
     */
    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)
                        ->where('tipo', $tipo)
                        ->get();
    }

    public static function buscaPorId(int $id)
    {
        return self::with([
                'movimentosEstoque' => function($query) {
                    $query->latest()->take(5);
                }, 
                'movimentosEstoque.produto'
            ])
            ->findOrFail($id);
    }

    /**
     * Cria acessor chamado text para serialização
     *
     * @return void
     */
    public function getTextAttribute(): string
    {
        return \sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social']
        );
    }
}
