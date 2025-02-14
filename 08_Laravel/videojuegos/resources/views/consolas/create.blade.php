<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>document</title>
</head>
<body>
    <form action="{{ route('consolas.store')}}" method="post">
        @csrf
        <label>
            Nombre: <input type="text" name="nombre">
        </label>
        <br>
        <label>
            Ano Lanzamiento: <input type="number" name="ano_lanzamiento" id="">
        </label>
        <input type="submit" value="Crear">
    </form>
</body>
</html>