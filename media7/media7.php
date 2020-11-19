<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 y media</title>
</head>

<body>

    <?php
    include "./media7fun.php";

    //datos formulario
    datos();

    // generar cartas
    $cartas = generarCartas();
    $jugadores=array();
    $puntuaciones=array();

    //añadir jugadores 
    for($i=0;$i<4;$i++){
    array_push($jugadores, asignarCartas($cartas)[0]);
    $cartas = asignarCartas($cartas)[1];
    }

    //obtener puntuaciones
    for($i=0;$i<4;$i++){
    array_push($puntuaciones, puntuacion($jugadores[$i]));
    }

    //resultados
    $resultados=resultados($puntuaciones);
   
    //imprimir resultados
    imprimir($jugadores, $puntuaciones, $resultados);

    escribirFichero($puntuaciones, $resultados);
    

    ?>
</body>
</html>