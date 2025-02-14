<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videojuego</title>
</head>
<body>
    <h1>Videojuego</h1>
    <h2>Titulo: {{ $videojuegos -> titulo}}</h2>
    <h2>Pegi: {{ $videojuegos -> pegi }}</h2>
    <h2>Genero: {{ $videojuegos -> genero }}</h2>
</body>
</html>