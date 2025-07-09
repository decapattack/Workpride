{{-- resources/views/welcome.blade.php --}}

{{-- Informa que esta view vai usar o layout 'layouts.app' --}}
@extends('layouts.app')

{{-- Define o título específico para esta página --}}
@section('title', 'Página Inicial')

{{-- Define o conteúdo que será inserido na área @yield('content') do layout --}}
@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Laravel</h1>
            <p class="col-md-8 fs-4">Bem-vindo à sua aplicação Laravel com um layout organizado!</p>
            <button class="btn btn-primary btn-lg" type="button">Botão de Exemplo</button>
        </div>
    </div>
@endsection
