<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $characters = [];
        if(isset($_GET["elecionPj"])) {
            $url = "https://genshin-impact.up.railway.app/character/" . $_GET["elecionPj"];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
    
            $datos = json_decode($respuesta, true);
            $characterInfo = $datos;


            $url = "https://genshin-impact.up.railway.app/character";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
    
            $datos = json_decode($respuesta, true);
            $characters = $datos["characters"];
        } else {
            $url = "https://genshin-impact.up.railway.app/character";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
    
            $datos = json_decode($respuesta, true);
            $characters = $datos["characters"];
        }
    ?>
    <form action="" method="get">
        <select name="elecionPj" id="">
            <?php
                if(!empty($characters)) {
                    foreach ($characters as $character) { ?>
                        <option value="<?php echo $character?>">
                            <?php echo htmlspecialchars($character) ?>
                        </option>
                    <?php
                    }
                }
                ?>
        </select>
        <input type="submit" value="Ver Personaje">
    </form>
        <?php
            if(isset($characterInfo)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Vision</th>
                            <th>Weapon</th>
                            <th>Nation</th>
                            <th>Rarity</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><?php echo $characterInfo["name"]?></td>
                        <td><?php echo$characterInfo["vision"]?></td>
                        <td><?php echo$characterInfo["weapon"]?></td>
                        <td><?php echo$characterInfo["nation"]?></td>
                        <td><?php echo$characterInfo["rarity"]?></td>
                        <td><img src="<?php echo$characterInfo["img"]["icon"]?>" alt=""></td>
                    </tbody>
                </table>
            <?php
            }
        ?>
</body>
</html>