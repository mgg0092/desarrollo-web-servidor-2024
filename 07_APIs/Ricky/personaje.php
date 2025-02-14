<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        if(isset($_GET["gender"]) && isset($_GET["species"])) {
            $url = "https://rickandmortyapi.com/api/character/?gender=" . $_GET['gender'] . "&species=" . $_GET["species"];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $cantPersonajes = $datos["info"];
            $personajes = $datos["results"];
        } else {
            $url = "https://rickandmortyapi.com/api/character";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
    
            $datos = json_decode($respuesta, true);
            $cantPersonajes = $datos["info"];
            $personajes = $datos["results"];
        }
    ?>
    <form action="" method="get">
        <label>
            Gender:
            <br>
            <label>
                Male: <input type="radio" name="gender" value="male">
            </label>
            <label>
                Female: <input type="radio" name="gender" value="female">
            </label>
        </label>
        <br>
        <label>
            Species:
            <br>
            <label>
                Human: <input type="radio" name="species" value="human">
            </label>
            <label>
                Alien: <input type="radio" name="species" value="alien">
            </label>
        </label>
        <br>
        <input type="submit" value="Filtrar">
    </form>
    <br>
    <label>
        Cantidad de Personajes: <input type="text" value="<?php echo $cantPersonajes["count"] ?>">
    </label>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Especie</th>
                <th>Origen</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($personajes as $personaje) {
                echo "<tr>";
                echo "<td>" . $personaje["name"] . "</td>";
                echo "<td>" . $personaje["gender"] . "</td>";
                echo "<td>" . $personaje["species"] . "</td>";
                echo "<td>" . $personaje["origin"]["name"] . "</td>";
                echo "<td> <img width='100px' src='" . $personaje["image"] . "' alt=''> </td>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>