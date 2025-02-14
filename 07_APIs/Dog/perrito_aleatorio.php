<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET["random"])) {
        $url = "https://dog.ceo/api/breeds/image/" . $_GET["random"];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $perro = $datos["message"];
    } else {
        echo "<h1>Haz Click AQUI</h1>";
    }
    ?>
    <form action="" method="get">
        <input type="hidden" name="random" value="random">
        <input type="submit" value="Mostar Perro Random">
    </form>
    <img src="<?php echo $perro ?>" alt="">
</body>
</html>