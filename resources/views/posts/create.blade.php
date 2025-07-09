@extends('layouts.app')

@section('title', 'Criar Novo Post')

@section('content')
    <h1>Criar Novo Post</h1>

    {{-- Exibe erros de validao --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Ttulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>
        <div class="mb-3">
            <label for="conteudo" class="form-label">Contedo</label>
            <textarea class="form-control" id="conteudo" name="conteudo" rows="10" required>{{ old('conteudo') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
@endsection
