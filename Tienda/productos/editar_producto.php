<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar Producto</title>
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

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_categoria = $_POST["categoria"];
            $tmp_precio = $_POST["precio"];
            $tmp_stock = $_POST["stock"];
            
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
            } elseif(!preg_match("/^[0-9]{1,4}({.,}[0-9]{1,2})?$/", $tmp_precio)) {
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

            if(isset($nombre) && isset($descripcion) && isset($categoria) && isset($precio) && isset($stock)){
                // $sql = "UPDATE productos SET
                //     nombre = '$nombre',
                //     precio = '$precio',
                //     categoria = '$categoria',
                //     stock = '$stock',
                //     descripcion = '$descripcion'
                //     WHERE id_producto = '$id_producto'";
                
                // $_conexion -> query($sql);

                $sql = $_conexion -> prepare("UPDATE productos SET
                    nombre = ?,
                    precio = ?,
                    categoria = ?,
                    stock = ?,
                    descripcion = ?
                    WHERE id_producto = ?");

                $sql -> bind_param("sdsisi", 
                    $nombre,
                    $precio,
                    $categoria,
                    $stock,
                    $descripcion,
                    $id_producto);

                $sql -> execute();
            }
        }

        $id_producto = $_GET["id_producto"];
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = $_conexion -> query($sql);
        $producto = $resultado -> fetch_assoc();
    ?>
    <header>
        <a class="btn_volver" href="index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="container">
        <form action="" method="post">
            <div class="caja-input">
                <input type="text" name="nombre" value="<?php echo $producto["nombre"] ?>">
                <label>Nombre</label>
            </div>
            <div class="caja-textarea">
                <textarea name="descripcion"><?php echo $producto["descripcion"] ?></textarea>
                <label>Descripcion</label>
            </div>
            <div class="caja-select">
                <select class="form-select" name="categoria">
                    <option value="<?php echo $producto["categoria"] ?>" selected >--- Elige una Categoria ---</option>
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
                <input type="text" name="precio" value="<?php echo $producto["precio"] ?>">
                <label>Precio</label>
                <?php if(isset($err_precio)) echo "<span class='err'>$err_precio</span>" ?>
            </div>
            <div class="caja-input">
                <input class="form-control" type="text" name="stock" value="<?php echo $producto["stock"] ?>">
                <label class="form-label">Stock</label>
                <?php if(isset($err_stock)) echo "<span class='err'>$err_stock</span>" ?>
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
            <input class="btn btn-primary" type="submit" value="Crear">
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>