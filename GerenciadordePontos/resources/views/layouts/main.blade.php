<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/assets/img/mark-icon.ico">
</head>
<body>
    <header>
        <img src="/assets/img/mark-logo.png" alt="" class="mark-logo">
        <nav>
            {{-- Somente o usuário que já acessou com sua conta pode ver o link para "Logout" --}}
            @auth
            <a href="{{ route('mark.destroy') }}">Logout</a>
            @endauth
        </nav>
    </header>
    @yield('content')
</body>
</html>