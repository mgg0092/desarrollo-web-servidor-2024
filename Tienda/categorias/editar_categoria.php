<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar Categoria</title>
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
            $categoria = $_POST["categoria"];
            $tmp_descripcion = $_POST["descripcion"];

            if($tmp_descripcion == ''){
                $err_descripcion = "El campo descripcion es obligatorio";
            } elseif(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "El campo descripcion no puede tener mas de 255 caracteres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_descripcion)) {
                $err_descripcion = "El campo descripcion solo puede contener letras, numeros y espacios en blanco";
            } else {
                $descripcion = $tmp_descripcion;
            }

            if(isset($descripcion)) {
                $sql = "UPDATE categorias SET descripcion = '$descripcion' WHERE categoria = '$categoria'";
                
                $_conexion -> query($sql);
            }
        }

        $n_categoria = $_GET["categoria"];
        $sql = "SELECT * FROM categorias WHERE categoria = '$n_categoria'";
        $resultado = $_conexion -> query($sql);
        $categoria = $resultado -> fetch_assoc();
    ?>
    <header>
        <a class="btn_volver" href="index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="container">
        <form action="" method="post">
            <div class="caja-input">
                <input type="text" value="<?php echo $categoria["categoria"] ?>" disabled>
                <label>Categoria</label>
            </div>
            <div class="caja-textarea">
                <textarea name="descripcion"><?php echo $categoria["descripcion"] ?></textarea>
                <label>Descripcion</label>
                <?php if(isset($err_descripcion)) echo "<span class='err'>$err_descripcion</span>" ?>
            </div>
            <input type="hidden" name="categoria" value="<?php echo $categoria["categoria"] ?>">
            <input class="btn" type="submit" value="Modificar">
            </div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>