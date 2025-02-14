<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videojuegos</title>
</head>
<body>
    <form action="{{ route('videojuegos.store')}}" method="post">
        @csrf
        <label>
            Titulo: <input type="text" name="titulo">
        </label>
        <br>
        <label>
            Pegi: <input type="number" name="pegi" id="">
        </label>
        <br>
        <label>
            Genero: <input type="text" name="genero" id="">
        </label>
        <input type="submit" value="Crear">
    </form>
</body>
</html>