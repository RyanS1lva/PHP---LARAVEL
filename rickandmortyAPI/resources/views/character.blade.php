<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rick and Morty API</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <img src="/img/Rick and Morty Portal.png" alt="" class="portal">
        <h1>Rick and Morty API</h1>
    </header>
    <main>
        <img src="{{"https://rickandmortyapi.com/api/character/avatar/{$character['id']}.jpeg"}}" alt="" class="imagem-avatar">
        <h2>{{ $character['name'] }}</h2>
        <p>Status do personagem: {{ $status }}</p>
        <p>Local de origem: {{ $origin }}</p>
        <div class="container">
            @if($character['id'] > 1)
            <a href="{{ url('/personagem/' . $character['id'] - 1)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12"/>
                </svg>
            </a>
            @endif
            
            @if($character['id'] < 826)
            <a href="{{ url('/personagem/' . $character['id'] + 1)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                </svg>
            </a>
            @endif
        </div>
    </main>
</body>
</html>