<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nuevo Fabricante</title>
    <?php  
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );  

        require('conexion.php');
    ?>
</head>
<body>
   <div class="container">
        <?php
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fabricante = $_POST["fabricante"];
                $pais = $_POST["pais"];

                $sql = "INSERT INTO fabricantes (fabricante, pais) VALUES ('$fabricante', '$pais')";
                
                $_conexion -> query($sql);
            }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Fabricante</label>
                <input type="text" class="form-control" name="fabricante">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pais</label>
                <input type="text" class="form-control" name="pais">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Crear">
            </div>
        </form>
    </div>
</body>
</html>
