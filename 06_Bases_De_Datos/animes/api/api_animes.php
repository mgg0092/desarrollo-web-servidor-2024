<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);


    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Peticion no valida"]);
    }

    function manejarGet($_conexion) {
        if(isset($_GET['nombre_estudio']) && isset($_GET['anno_fundacion'])) {
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio AND anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                'nombre_estudio' => $_GET['nombre_estudio'],
                'anno_fundacion' => $_GET['anno_fundacion']
            ]);
        } elseif(isset($_GET['nombre_estudio'])) {
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                'nombre_estudio' => $_GET['nombre_estudio']
            ]);
        } elseif(isset($_GET['anno_fundacion'])) {
            $sql = "SELECT * FROM animes WHERE anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                'anno_fundacion' => $_GET['anno_fundacion']
            ]);
        } else {
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) {
        //! echo json_encode(["metodo" => "post"]);
        $sql = "INSERT INTO estudios VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"],
            "ciudad"  => $entrada["ciudad"],
            "anno_fundacion"  => $entrada["anno_fundacion"]
        ]);

        if($stmt) {
            echo json_encode(["mensaje" => "El estudio se ha creado"]);
        } else {
            echo json_encode(["mensaje" => "Error al crear el estudio"]);
        }
    }

    function manejarPut($_conexion, $entrada) {
        //! echo json_encode(["metodo" => "put"]);
        $sql = "UPDATE estudios SET
            ciudad = :ciudad,
            anno_fundacion = :anno_fundacion
            WHERE nombre_estudio = :nombre_estudio";
            
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "ciudad"  => $entrada["ciudad"],
            "anno_fundacion"  => $entrada["anno_fundacion"],
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);

        if($stmt) {
            echo json_encode(["mensaje" => "El estudio se ha actualizado"]);
        } else {
            echo json_encode(["mensaje" => "Error al actualizar el estudio"]);
        }
    }

    function manejarDelete($_conexion, $entrada) {
        //! echo json_encode(["metodo" => "delete"]);
        $sql = "DELETE FROM estudios WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);

        if($stmt) {
            echo json_encode(["mensaje" => "El estudio se ha borrado"]);
        } else {
            echo json_encode(["mensaje" => "Error al borrar el estudio"]);
        }
    }
?>