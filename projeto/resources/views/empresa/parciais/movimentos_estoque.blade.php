
<div class="col-md-12">
<div class="card">
    @if ($empresa->tipo === 'fornecedor')
        <div class="card-header">Últimos itens comprados deste fornecedor:</div>
    @else
        <div class="card-header">Últimos itens vendidos para este cliente:</div>
    @endif    
        <div class="card-body">                    
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Quantidade em KG</th>
                            <th>Valor por KG</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empresa->movimentosEstoque as $movimentoEstoque)
                        <tr>
                            <td>{{ $movimentoEstoque->produto->nome }}</td>
                            <td>{{ data_iso_para_br($movimentoEstoque->create_ai) }}</td>
                            <td>{{ ucfirst($movimentoEstoque->tipo) }}</td>
                            <td>{{ numero_iso_para_br($movimentoEstoque->quantidade) }}</td>
                            <td>R$ {{ numero_iso_para_br($movimentoEstoque->valor) }}</td>
                            <td>R$ {{ numero_iso_para_br($movimentoEstoque->quantidade*$movimentoEstoque->valor) }}</td>
                            <td>
                                <form method="POST" action="{{ route('movimentos_estoque.destroy', $movimentoEstoque) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Apagar Movimento" onclick="return confirm(&quot;Tem certeza que deseja apagar esse movimento?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <form method="POST" action="{{ route('movimentos_estoque.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                <input type="hidden" name="tipo" value="{{ $empresa->tipo === 'fornecedor' ? 'entrada' : 'saida' }}">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="produto_id">Produto</label>
                            <div class="input-group">
                                <select id="produto-ajax" name="produto_id" type="text" class="form-control" style="width: 100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="quantidade">Quantidade (KG)</label>
                            <div class="input-group">
                                <input id="quantidade" name="quantidade" type="text" class="form-control money">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="valor">Valor por KG</label>
                            <div class="input-group">
                                <input id="valor" name="valor" type="text" class="form-control money">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group pt-2">
                            <label class="control-label" for=""></label>
                            <div class="input-group">
                                <button class="btn btn-info m-t-xs" title=""><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  