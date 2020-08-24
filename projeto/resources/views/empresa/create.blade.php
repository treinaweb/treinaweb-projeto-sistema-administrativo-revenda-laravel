@extends('layouts.app')

@section('title')
    <h1>Novo {{ $tipo }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listagem {{ $tipo }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}">Novo {{ $tipo }}</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Entre com os dados</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('empresas.store') }}" method="post">

                        @include('empresa.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
