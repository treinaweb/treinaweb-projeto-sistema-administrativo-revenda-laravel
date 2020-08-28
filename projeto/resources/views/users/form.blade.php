<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-form-label col-sm-2">{{ 'Name' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-form-label col-sm-2">{{ 'Email' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-form-label col-sm-2">Senha</label>
    <div class="col-sm-10">
        <input class="form-control" name="password" type="password" id="password" value="" required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-sm-2 col-form-label">Confirme a Senha</label>

    <div class="col-sm-10">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Criar' }}">
</div>
