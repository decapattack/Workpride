@extends('layouts.app')

@section('title', $post->titulo)

@section('content')
    <article>
        <h1>{{ $post->titulo }}</h1>
        <p class="text-muted">
            Por {{ $post->user->name }} em {{ $post->created_at->format('d/m/Y H:i') }}
        </p>
        <div class="fs-5">
            {!! nl2br(e($post->conteudo)) !!}
        </div>
    </article>

    <hr class="my-5">

    <section id="comentarios">
        <h2>Comentrios</h2>

        @forelse ($post->comentarios as $comentario)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $comentario->conteudo }}</p>
                    <small class="text-muted">
                        Enviado por {{ $comentario->user->name }} em {{ $comentario->created_at->format('d/m/Y') }}
                    </small>
                </div>
            </div>
        @empty
            <p>Ainda no h comentrios. Seja o primeiro a comentar!</p>
        @endforelse
    </section>

    {{-- Aqui voc poderia adicionar um formulrio para novos comentrios --}}

@endsection
