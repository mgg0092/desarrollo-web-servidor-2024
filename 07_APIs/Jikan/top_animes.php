<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP Anime</title>
</head>
<body>
    <?php
    if(isset($_GET["type"]) && $_GET["type"] != "all") {
        $url = "https://api.jikan.moe/v4/top/anime?type=" . $_GET["type"];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
    } else {
        $url = "https://api.jikan.moe/v4/top/anime";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $pagina = $datos["pagination"];
    }

    if(isset($_GET["type"]) && $_GET["type"] != "all") {
        $url = "https://api.jikan.moe/v4/top/anime?type=" . $_GET["type"];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
    } else {
        $url = "https://api.jikan.moe/v4/top/anime";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $pagina = $datos["pagination"];
    }

    ?>
    <form action="" method="get">
        Filtros
        <br>
        <label>
            Todos: <input type="radio" name="type" value="g">
        </label>
        <label>
            Series: <input type="radio" name="type" value="tv">
        </label>
        <label>
            Peliculas: <input type="radio" name="type" value="movie">
        </label>
        <input type="submit" value="Filtar">
    </form>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Titulo</th>
                <th>Valoracion</th>
                <th>Imagen</th>
                <th>Enlace al anime</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($animes as $anime) {
                echo "<tr>";
                echo "<td>" . $anime["rank"] . "</td>";
                echo "<td>" . $anime["title_japanese"] . "</td>";
                echo "<td>" . $anime["score"] . "</td>";
                echo "<td> <img width='100px' src='" . $anime["images"]["webp"]["image_url"] . "' alt=''> </td>";
                ?>
                <td>
                    <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">Ir al Anime</a>
                </td>
            <?php
                echo "</tr>";
            ?>
            <?php
                }
            ?>
            </tbody>
        </tbody>
    </table>
</body>
</html>