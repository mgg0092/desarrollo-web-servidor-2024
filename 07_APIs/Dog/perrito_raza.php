<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET["razaPerro"])) {
        $url = "https://dog.ceo/api/breeds/list";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $perros = $datos["message"];

        $urlFoto = "https://dog.ceo/api/breed/". $_GET["razaPerro"] ."/images/random";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlFoto);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $perrosFoto = $datos["message"];
    } else {
        $url = "https://dog.ceo/api/breeds/list";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $perros = $datos["message"];
    }
    ?>
    <form action="" method="get">
        <select name="razaPerro" id="">
            <?php
                foreach ($perros as $perro) { ?>
                <option value="<?php echo $perro?>">
                    <?php echo $perro ?>
                </option>
            <?php
                }
            ?>
        </select>
        <input type="submit" value="Mostrar Perro">
    </form>
    <?php
        if(isset($_GET["razaPerro"])) { ?>
            <img src="<?php echo $perrosFoto ?>" alt="">
    <?php
        }
    ?>
</body>
</html>