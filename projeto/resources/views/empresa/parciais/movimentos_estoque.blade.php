
<div class="col-md-12">
<div class="card">
    <div class="card-header">Últimos Lançamentos</div>
        <div class="card-body">                    
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade em KG</th>
                            <th>Valor por KG</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Papel X1</td>
                            <td>1.100,00</td>
                            <td>R$ 0,50</td>
                            <td>R$ 550,00</td>
                            <td>
                                <form method="POST" action="{{ url('/' . '/' ) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Apagar Movimento" onclick="return confirm(&quot;Tem certeza que deseja apagar esse movimento?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <form method="GET">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="produto">Produto</label>
                            <div class="input-group">
                                <select id="produto-ajax" name="produto" type="text" class="form-control"></select>
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