@extends('layouts.app')

@section('title')
    <h1>Detalhes Movimento financeiro</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos_financeiros') }}">Listagem Movimentos Financeiros</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos_financeiros/' . $movimentos_financeiro->id) }}">Detalhes Movimento financeiro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Detalhes do Movimento financeiro {{ $movimentos_financeiro->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/movimentos_financeiros') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>

                        <form method="POST" action="{{ url('movimentos_financeiros' . '/' . $movimentos_financeiro->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Movimentos_financeiro" onclick="return confirm(&quot;Tem certeza que deseja apagar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $movimentos_financeiro->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Tipo </th>
                                        <td><span class="badge badge-{{ $movimentos_financeiro->tipo === 'entrada' ? 'success' : 'danger' }}">{{ ucfirst($movimentos_financeiro->tipo) }}</span></td>
                                    </tr>
                                    <tr>
                                        <th> Empresa </th>
                                        <td>{{ $movimentos_financeiro->empresa->nome }} ({{ $movimentos_financeiro->empresa->razao_social }})</td>
                                    </tr>
                                    <tr>
                                        <th> Descricao </th>
                                        <td> {{ $movimentos_financeiro->descricao }} </td>
                                    </tr>
                                    <tr>
                                        <th> Valor </th>
                                        <td>R$ {{ numero_iso_para_br($movimentos_financeiro->valor) }} </td>
                                    </tr>
                                    <tr>
                                        <th> Data </th>
                                        <td> {{ data_iso_para_br($movimentos_financeiro->created_at) }} </td>
                                    </tr>
                                    



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
