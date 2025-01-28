<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
</head>

<body>
    <?php
        $url = "https://api.jikan.moe/v4/anime/" . $_GET['id']. "/full";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>SINOPSIS</th>
                <th>Generos</th>
                <th>Productoras</th>
                <th>Imagen</th>
                <th>ANO</th>
                <th>BONUS TRACK</th>
                <th>Anime Relacionados</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo $anime["title_japanese"] ?> </td>
                <td> <?php echo $anime["synopsis"] ?> </td>
                <td> 
                <?php for ($i=0; $i < count($anime["genres"]); $i++) {
                    echo "<ul style='list-style:none'>";
                        echo "<li>" . $anime["genres"][$i]["name"] . "</li>";
                    echo "</ul>"; 
                }
                ?>
                </td>
                <td> 
                <?php for ($i=0; $i < count($anime["producers"]); $i++) {
                    echo "<ul style='list-style:none'>";
                        echo "<li>" . $anime["producers"][$i]["name"] . "</li>";
                    echo "</ul>"; 
                }
                ?>
                </td>
                <td> <img src=" <?php echo $anime['images']['webp']['image_url'] ?>" alt=''> </td>
                <td> <?php echo $anime["year"] ?> </td>
                <td> <iframe width="300"
                height="350" src="<?php echo $anime["trailer"]["embed_url"]?>" ></iframe> </td>
                <td> 
                <?php for ($i=0; $i <= count($anime["relations"]); $i++) {
                        for ($j=0; $j < count($anime["relations"][$i]["entry"]); $j++) { 
                            if($anime["relations"][$i]["entry"][$j]["type"] == "anime"){
                                echo "<ul style='list-style:none'>";
                                echo "<li>" . $anime["relations"][$i]["entry"][$j]["name"] . "</li>";
                                echo "</ul>"; 
                            }
                        } 
                    }
                ?>
                </td>
        </tbody>
        </tbody>
    </table>
</body>
</html>