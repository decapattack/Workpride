{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Inclui o conteúdo do cabeçalho --}}
    @include('layouts.partials.head')
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Inclui a barra de navegação --}}
    @include('layouts.partials.navbar')

    {{-- Área principal onde o conteúdo de cada página será inserido --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Inclui o rodapé --}}
    @include('layouts.partials.footer')

    {{-- Scripts JS (é uma boa prática colocá-los no final do body) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
