<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombreP = depurar($_POST["nombreP"]);
            $tmp_pesoP = $_POST["pesoP"];
            if(isset($_POST["generoP"])) $tmp_generoP = $_POST["generoP"];
            else $tmp_generoP = "Desconocido";
            $tmp_tipoP = $_POST["TipoP"];
            $tmp_fecha_capturaP = $_POST["fecha_capturaP"];
            $tmp_descripcionP = $_POST["descripcionP"];
            

            if($tmp_nombreP == "") {
                $err_nombreP = "El nombre del pokemon es obligatorio";
            } else {
                if(strlen($tmp_nombreP) < 3 || strlen($tmp_nombreP) > 30) {
                    $err_nombreP = "El nombre debe tener entre 3 y 30 caracteres";
                } else {
                    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñ ]+$/";
                    if(!preg_match($patron, $tmp_nombreP)) {
                        $err_nombreP = "El nombre solo puede contener 
                            letras con o sin tilde, ñ y espacios en blanco";
                    } else {
                        $nombreP = $tmp_nombreP;
                    }
                }
            }

            if($tmp_pesoP == "") {
                $err_pesoP = "El peso del pokemon es obligatorio";
            } else {
                if($tmp_pesoP < 0.1 || $tmp_pesoP > 999.999) {
                    $err_pesoP = "El peso del pokemon debe estar entre 0.1 y 999.999";
                } else {
                    $pesoP = $tmp_pesoP;
                }
            }

            if($tmp_tipoP == "") {
                $err_tipoP = "El tipo del pokemon es obligatorio";
            } else {
                $tipos_validas = ["agua","fuego","volador","planta","electrico"];
                if(!in_array($tmp_tipoP, $tipos_validas)) {
                    $err_tipoP = "Elige una tipo válido";
                } else {
                    $tipoProP = $tmp_tipoP;
                }
            }

            if(isset($_POST["generoP"])) {
                $generos_validas = ["macho","hembra"];
                if(!in_array($tmp_generoP, $generos_validas)) {
                    $err_generoP = "Elige una genero válida";
                } else {
                    $generoP = $tmp_generoP;
                }
            } else {
                $generoP = "Desconocido";
            }

        if($tmp_fecha_capturaP == "") {
            $err_fecha_capturaP = "La fecha de captura es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_capturaP)) {
                $err_fecha_capturaP = "El formato de la fecha es incorrecto";
            } else {
                list($anno,$mes,$dia) = explode('-',$tmp_fecha_capturaP);
                if($anno < 1994) {
                    $err_fecha_capturaP = "El año no puede ser anterior a 1994";
                } else {
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");
                    if($anno > $anno_actual) {
                        $err_fecha_capturaP = "La fecha de captura 
                            no puede ser mayor al año actual";
                    } elseif($anno <= $anno_actual) {
                        $fecha_capturaP = $tmp_fecha_capturaP;
                    } else {
                        if($mes <= $mes_actual) {
                            $fecha_capturaP = $tmp_fecha_capturaP;
                        } elseif($mes > $mes_actual) {
                            $err_fecha_capturaP = "La fecha de captura 
                            no puede ser mayor al dia actual";
                        } else {
                            if($dia > $dia_actual) {
                                $err_fecha_capturaP = "La fecha de captura 
                            no puede ser mayor al dia actual";
                            } elseif($dia <= $dia_actual) {
                                $fecha_capturaP = $tmp_fecha_capturaP;
                            }
                        }
                    }
                }
            }

            if($tmp_descripcionP == "") {
                $descripcionP = $tmp_descripcionP;
            } else {
                if(strlen($tmp_descripcionP) > 200) {
                    $err_descripcionP = "La descripción no puede tener más de 255 caracteres";
                } else {
                    $patron = "/^[a-zA-Z0-9áéíóúÁÉÍÓÚñ ]+$/";
                    if(!preg_match($patron, $tmp_descripcionP)) {
                        $err_descripcionP = "El nombre solo puede contener 
                        letras con o sin tilde, ñ y espacios en blanco";
                    } else {
                        $descripcionP = $tmp_descripcionP;
                    }
                }
            }
        }
    }
    ?>
    <h1>Formulario de Pokemon</h1>
    <form action="" method="post">
        <div>
            <label for="nombre">Nombre del Pokemon: </label>
            <input type="text" name="nombreP">
            <?php if(isset($err_nombreP)) echo "<span class='error'>$err_nombreP</span>" ?>
        </div>
        <div>
            <label for="peso">Peso del Pokemon:</label>
            <input type="text" name="PesoP">
            <?php if(isset($err_PesoP)) echo "<span class='error'>$err_PesoP</span>" ?>
        </div>
        </div>
        <div>
            <label for="genero">Genero del Pokemon:</label>
            <div>
                <input type="radio" name="generoP" value="Macho">
                <label class="macho">Macho</label>
            </div>
            <div>
                <input type="radio" name="generoP" value="Hembra">
                <label class="hembra">Hembra</label>
            </div>
            <?php if(isset($err_generoP)) echo "<span class='error'>$err_generoP</span>" ?>
        </div>
        </div>
        <div>
            <label for="tipo">Tipo del Pokemon:</label>
            <select name="TipoP">
                <option value="agua">agua</option>
                <option value="fuego">fuego</option>
                <option value="volador">volador</option>
                <option value="planta">planta</option>
                <option value="electrico">electrico</option>
            </select>
            <?php if(isset($err_TipoP)) echo "<span class='error'>$err_TipoP</span>" ?>
        </div>
        </div>
        <div>
            <label for="fecha">Fecha de Captura del Pokemon:</label>
            <input type="date" name="fecha_capturaP">
            <?php if(isset($err_fecha_capturaP)) echo "<span class='error'>$err_fecha_capturaP</span>" ?>
        </div>
        <div>
            <label for="descripcion">Descripcion del Pokemon:</label>
            <textarea name="descripcionP"></textarea>
            <?php if(isset($err_descripcionP)) echo "<span class='error'>$err_descripcionP</span>" ?>
        </div>
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>