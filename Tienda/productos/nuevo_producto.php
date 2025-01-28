<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Producto Nuevo</title>
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
        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion -> query($sql);
        $categorias = [];

        while($fila = $resultado -> fetch_assoc()) {
            array_push($categorias, $fila["categoria"]);
        }

        $extensiones_validas = ["image/jpeg", "image/png", "image/webp"];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = $_POST["nombre"];
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_categoria = $_POST["categoria"] ?? "";
            $tmp_precio = $_POST["precio"];
            $tmp_stock = $_POST["stock"];

            if(isset($_FILES["imagen"])) {
                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                $tipo_imagen = $_FILES["imagen"]["type"];
                $tamano_imagen = $_FILES["imagen"]["size"];

                if(getimagesize($direccion_temporal) === false) {
                    $err_imagen = "El archivo no es una imagen validad";
                }elseif(!in_array($tipo_imagen, $extensiones_validas)) {
                    $err_imagen = "Solo se permiten imagenes JPEG, PNG y WEBP";
                }

                $tamano_maximo = 5 * 1024 * 1024;
                if($tamano_imagen > $tamano_maximo) {
                    $err_imagen = "La imagen no puede pesar mas de 15 MB";
                }
            }

            if($tmp_nombre == "") {
                $err_nombre = "El campo nombre es obligatorio";
            } elseif (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 50) {
                $err_nombre = "El campo nombre debe contener entre 2 y 50 caracteres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_nombre)) {
                $err_nombre = "El campo nombre solo puede contener letras, numeros y espacios en blanco";
            } else {
                $nombre = $tmp_nombre;
            }

            if($tmp_descripcion == ''){
                $err_descripcion = "El campo descripcion es obligatorio";
            } elseif(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "El campo descripcion no puede tener mas de 255 caracteres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_descripcion)) {
                $err_descripcion = "El campo descripcion solo puede contener letras, numeros y espacios en blanco";
            } else {
                $descripcion = $tmp_descripcion;
            }

            if($tmp_categoria == "") {
                $err_categoria = "El categoria es obligatoria";
            } elseif(!in_array($tmp_categoria, $categorias)) {
                $err_categoria = "Elige una categoria válida";
            } else {
                $categoria = $tmp_categoria;
            }

            if($tmp_precio == "") {
                $err_precio = "El precio es obligatorio";
            } elseif(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_precio = "El precio debe ser un número";
            } elseif($tmp_precio < 0 || $tmp_precio > 9999.99) {
                $err_precio = "El precio no puede ser un número negativo ni un numero superior a 9999,99";
            } elseif(!preg_match("/^[0-9]{1,4}?(.)?[0-9]{1,2}$/", $tmp_precio)) {
                $err_precio = "El precio debe contener como maximo 4 enteros y 2 decimales";
            } else {
                $precio = $tmp_precio;
            }

            if(filter_var($tmp_stock, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_stock = "El stock debe ser un número";
            }elseif(strlen($tmp_stock) < 0 || strlen($tmp_stock) > 999) {
                $err_stock = "El stock debe tener como minimo 0 y como maximo 999";
            } else {
                $stock = $tmp_stock;
            }

            if(isset($nombre) && isset($descripcion) && isset($categoria) && isset($precio) && isset($stock) && !isset($err_imagen)) {
                move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");
                $imagen = "../imagenes/$nombre_imagen";

                // $sql = "INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion) 
                //     VALUES ('$nombre', '$precio', '$categoria', '$stock', 'imagenes/$nombre_imagen', '$descripcion')";
                // $_conexion -> query($sql);

                $sql = $_conexion -> prepare("INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES (?,?,?,?,?,?");
                
                $sql -> bind_param("sdsiss",
                    $nombre,
                    $precio,
                    $categoria,
                    $stock,
                    $imagen,
                    $descripcion);

                $sql -> execute();
            }
        }
    ?>
    <header>
        <a class="btn_volver" href="index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="caja-input">
                <label>Nombre</label>
                <input type="text" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='err'>$err_nombre</span>" ?>
            </div>
            <div class="caja-textarea">
                <textarea name="descripcion"></textarea>
                <label>Descripcion</label>
                <?php if(isset($err_descripcion)) echo "<span class='err'>$err_descripcion</span>" ?>
            </div>
            <div class="caja-select">
                <select class="" name="categoria">
                    <option value="" selected disabled hidden>--- Elige una categoria ---</option>
                    <?php
                        foreach($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria ?>">
                                <?php echo $categoria ?>
                            </option>
                        <?php 
                        }
                    ?>
                </select>

                <?php if(isset($err_categoria)) echo "<span class='err'>$err_categoria</span>" ?>
            </div>
            <div class="caja-input">
                <input type="text" name="precio">
                <label>Precio</label>
                <?php if(isset($err_precio)) echo "<span class='err'>$err_precio</span>" ?>
            </div>
            <div class="caja-input">
                <input type="text" name="stock">
                <label>Stock</label>
                <?php if(isset($err_stock)) echo "<span class='err'>$err_stock</span>" ?>
            </div>
            <div class="caja-file">
                <input type="file" name="imagen">
                <?php if(isset($err_imagen)) echo "<span class='err'>$err_imagen</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Crear">
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>