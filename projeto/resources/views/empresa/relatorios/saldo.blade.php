@extends('layouts.app')

@section('title')
    <h1>Relatório de Saldo Empresa {{ $empresa->nome }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Relatório de Saldo</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movimentações</div>
                    <div class="card-body">
                        <form method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_inicial">Data Inicial</label>
                                        <div class="input-group">
                                            <input id="data_inicio" name="data_inicial" type="text" class="form-control date" value="{{ request('data_inicial') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_final">Data Final</label>
                                        <div class="input-group">
                                            <input id="data_final" name="data_final" type="text" class="form-control date" value="{{ request('data_final') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group pt-2">
                                        <label class="control-label" for=""></label>
                                        <div class="input-group">
                                            <button class="btn btn-info m-t-xs" title="Buscar Conta"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                          


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Movimento</th>
                                        <th>Tipo</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Valor Un.</th>
                                        <th>Total</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($saldo as $item)
                                    <tr>
                                       <td>{{ data_iso_para_br($item->created_at) }}</td>

                                        @if ($item->movimento_type === 'App\Models\MovimentosEstoque')
                                            <td>estoque</td>
                                            <td>{{ $item->movimento->tipo }}</td>
                                            <td>{{ $item->movimento->produto->nome }}</td>
                                            <td>{{ numero_iso_para_br($item->movimento->quantidade) }}</td>
                                            <td>R$ {{ numero_iso_para_br($item->movimento->valor) }}</td>
                                            <td>R$ {{ numero_iso_para_br($item->movimento->quantidade * $item->movimento->valor) }}</td>
                                            <td>R$ {{ numero_iso_para_br($item->valor) }}</td>
                                        @else
                                            <td>Financeiro</td>
                                            <td>{{ $item->movimento->tipo }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>R$ {{ numero_iso_para_br($item->movimento->valor) }}</td>
                                            <td>R$ {{ numero_iso_para_br($item->valor) }}</td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
