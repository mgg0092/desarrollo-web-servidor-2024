<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Categoria Nueva</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
        require('../util/conexion.php');

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_categoria = $_POST["categoria"];
            $tmp_descripcion = $_POST["descripcion"];

            $sql = "SELECT COUNT(*) AS total FROM categorias WHERE categoria = '$tmp_categoria'";
            $resultado = $_conexion -> query($sql);
            $fila = $resultado -> fetch_assoc();

            if($tmp_categoria == ''){
                $err_categoria = "El campo categoria es obligatorio";
            } elseif (strlen($tmp_categoria) < 2 || strlen($tmp_categoria) > 30) {
                $err_categoria = "El campo categoria tiene que tener entre 2 y 30 caracteres";
            } elseif (!preg_match("/^[a-zA-Z ]+$/", $tmp_categoria)) {
                $err_categoria = "El campo categoria solo puede contener letras y espacios en blanco";
            } elseif($fila['total'] > 0) {
                $err_categoria = "El nombre introducido ya esta en la base de datos";
            } else {
                $categoria = $tmp_categoria;
            }
            
        // Validacion de la descripcion
            if($tmp_descripcion == ''){
                $err_descripcion = "El campo descripcion es obligatorio";
            } elseif(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "El campo descripcion no puede tener mas de 255 caracteres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_categoria)) {
                $err_categoria = "El campo descripcion solo puede contener letras, numeros y espacios en blanco";
            } else {
                $descripcion = $tmp_descripcion;
            }
            if(isset($categoria) && isset($descripcion)) {
                $sql = "INSERT INTO categorias (categoria, descripcion) VALUES ('$categoria', '$descripcion')";
                $_conexion -> query($sql);
            }
        }
    ?>
    <header>
        <a class="btn_volver" href="index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="container">
        <form action="" method="post">
            <div class="caja-input">
                <input type="text" name="categoria">
                <label>Nombre de la categoria</label>
                <?php if(isset($err_categoria)) echo "<span class='err'>$err_categoria</span>" ?>
            </div>
            <div class="caja-textarea">
                <textarea class="form-control" name="descripcion"></textarea>
                <label>Descripcion</label>
                <?php if(isset($err_descripcion)) echo "<span class='err'>$err_descripcion</span>" ?>
            </div>
            <input class="btn" type="submit" value="Crear">
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>