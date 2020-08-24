@extends('layouts.app')

@section('title')
    <h1>Listagem</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}">Listagem</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listagem</h3>
                    <div class="card-tools">
                        <a href="" class="btn btn-success">Novo</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome Empresa</th>
                                <th>Nome Contato</th>
                                <th>Celular</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->nome }}</td>
                                    <td>{{ $empresa->nome_contato }}</td>
                                    <td>{{ $empresa->celular }}</td>
                                    <td><a href="" class="btn btn-primary">Detalhes</a></td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $empresas->links() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
