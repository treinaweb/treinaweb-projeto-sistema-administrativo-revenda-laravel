<div class="form-group row {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="col-form-label col-sm-2">{{ 'Descricao' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($movimentos_financeiro->descricao) ? $movimentos_financeiro->descricao : ''}}" required>
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('valor') ? 'has-error' : ''}}">
    <label for="valor" class="col-form-label col-sm-2">{{ 'Valor' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="valor" type="number" id="valor" value="{{ isset($movimentos_financeiro->valor) ? $movimentos_financeiro->valor : ''}}" >
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('data') ? 'has-error' : ''}}">
    <label for="data" class="col-form-label col-sm-2">{{ 'Data' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="data" type="date" id="data" value="{{ isset($movimentos_financeiro->data) ? $movimentos_financeiro->data : ''}}" required>
        {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="col-form-label col-sm-2">{{ 'Tipo' }}</label>
    <div class="col-sm-10">
        <select name="tipo" class="form-control" id="tipo" required>
    @foreach (json_decode('{"entrada":"Entrada","saida":"Saida"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($movimentos_financeiro->tipo) && $movimentos_financeiro->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('empresa_id') ? 'has-error' : ''}}">
    <label for="empresa_id" class="col-form-label col-sm-2">{{ 'Empresa Id' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="empresa_id" type="number" id="empresa_id" value="{{ isset($movimentos_financeiro->empresa_id) ? $movimentos_financeiro->empresa_id : ''}}" required>
        {!! $errors->first('empresa_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Criar' }}">
</div>
