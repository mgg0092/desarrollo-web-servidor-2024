<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require("../05_Funciones/Edades.php");
    ?>
    <title>Document</title>
</head>
<body>
    <h1>Formulario Nombre y Edad</h1>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label for="edad">Edad: </label>
        <input type="text" name="edad"><br><br>
        <input type="submit" value="Enviar">
        <input type="hidden" name="accion" value="formulario_nombre_edad">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_nombre_edad') {
                $_nombre = $_POST['nombre'];
                $_edad = $_POST['edad'];
                
                comprobarEdad($_nombre, $_edad);
            }
        }
    ?>

    <h1>Formulario Base y Potencia</h1>
    <form action="" method="post">
        <label for="base">Base: </label>
        <input type="text" name="base"><br><br>
        <label for="exponente">Exponente: </label>
        <input type="text" name="exponente"><br><br>
        <input type="submit" value="Calcular">
        <input type="hidden" name="accion" value="formulario_base_exponente">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_base_exponente') {
                $_base = $_POST['base'];
                $_exponente = $_POST['exponente'];

                comprobarEdad($_base, $_exponente);
            }
        }
    ?>
</body>
</html>