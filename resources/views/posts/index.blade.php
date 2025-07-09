@extends('layouts.app')

@section('title', 'Meu Blog')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>ltimos Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Criar Novo Post</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $post->titulo }}</h2>
                <p class="card-text text-muted">
                    Por {{ $post->user->name }} em {{ $post->created_at->format('d/m/Y') }}
                </p>
                <p class="card-text">
                    {{ Str::limit($post->conteudo, 150) }}
                </p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Ler Mais</a>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Ainda no h posts publicados.
        </div>
    @endforelse

    {{-- Links de paginao --}}
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
