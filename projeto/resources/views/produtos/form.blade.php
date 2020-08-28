<div class="form-group row {{ $errors->has('nome') ? 'has-error' : ''}}">
    <label for="nome" class="col-form-label col-sm-2">{{ 'Nome' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ isset($produto->nome) ? $produto->nome : ''}}" required>
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="col-form-label col-sm-2">{{ 'Descricao' }}</label>
    <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="descricao" type="textarea" id="descricao" >{{ isset($produto->descricao) ? $produto->descricao : ''}}</textarea>
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Criar' }}">
</div>
