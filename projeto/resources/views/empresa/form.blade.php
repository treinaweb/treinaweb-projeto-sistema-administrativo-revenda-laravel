@csrf

<input type="hidden" name="tipo" value="{{ $tipo }}">

<div class="form-group row">
    <label for="nome" class="col-form-label col-sm-2 required">Nome*</label>
    <div class="col-sm-10">
        <input type="text" name="nome" maxlength="255" class="form-control @error('nome') is-invalid @enderror">
    
        @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="razao_social">Razão Social</label>
    <div class="col-sm-10">
        <input type="text" id="razao_social" name="razao_social" maxlength="255" class="form-control @error('razao_social') is-invalid @enderror">
        @error('razao_social')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2 required" for="documento">Documento*</label>
    <div class="col-sm-10">
        <input type="text" id="documento" name="documento" required="required" maxlength="18" class="cpf_cnpj form-control @error('documento') is-invalid @enderror">
        @error('documento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="ie_rg">IE/RG</label>
    <div class="col-sm-10">
        <input type="text" id="ie_rg" name="ie_rg" maxlength="12" class="ie_rg form-control @error('ie_rg') is-invalid @enderror">
        @error('ie_rg')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div id="cliente"><div class="form-group row">
    <label class="col-form-label col-sm-2 required" for="nome_contato">Nome Contato*</label>
    <div class="col-sm-10">
        <input type="text" id="nome_contato" name="nome_contato" required="required" maxlength="255" class="form-control @error('nome_contato') is-invalid @enderror">
        @error('nome_contato')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>    
<div class="form-group row">
    <label class="col-form-label col-sm-2 required" for="celular">Celular*</label>
    <div class="col-sm-10">
        <input type="text" id="celular" name="celular" required="required" maxlength="15" class="phone form-control @error('celular') is-invalid @enderror">
        @error('celular')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="email">Email*</label>
    <div class="col-sm-10">
        <input type="text" id="email" name="email" maxlength="100" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="telefone">Telefone</label>
    <div class="col-sm-10">
        <input type="text" id="telefone" name="telefone" maxlength="15" class="phone form-control @error('telefone') is-invalid @enderror">
        @error('telefone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-sm-2" for="cep">Cep*</label>
    <div class="col-sm-10">
        <input type="text" id="cep" name="cep" maxlength="9" class="cep form-control @error('cep') is-invalid @enderror">
        @error('cep')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="logradouro">Logradouro*</label>
    <div class="col-sm-10">
        <input type="text" id="logradouro" name="logradouro" maxlength="150" class="form-control @error('logradouro') is-invalid @enderror">
        @error('logradouro')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="bairro">Bairro*</label>
    <div class="col-sm-10">
        <input type="text" id="bairro" name="bairro" maxlength="100" class="form-control @error('bairro') is-invalid @enderror">
        @error('bairro')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="cidade">Cidade*</label>
    <div class="col-sm-10">
        <input type="text" id="cidade" name="cidade" maxlength="100" class="form-control @error('cidade') is-invalid @enderror">
        @error('cidade')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-2" for="estado">Estado*</label>
    <div class="col-sm-10">
        <input type="text" id="estado" name="estado" maxlength="2" class="form-control @error('estado') is-invalid @enderror">
        @error('estado')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
    <div class="form-group row">
    <label class="col-form-label col-sm-2" for="observacao">Observacao</label>
    <div class="col-sm-10">
        <input type="text" id="observacao" name="observacao" maxlength="500" class="form-control @error('observacao') is-invalid @enderror">
        @error('observacao')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<button class="btn btn-primary" name="submit" value="" type="submit">Salvar</button>
