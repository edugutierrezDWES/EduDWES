<html>

<head>
    <title> Bingo
    </title>
   
</head>

<body>

    <!--Bingo
       -->

    <?php
    include "./functions/bingoFunciones.php";

    // Main
    $jugadores = generarJugadores(/*$numJugadores, $numCartones */);
    $ganadores = juego($jugadores, bombo())[0]; //recoger ganadores
    $bolasSacadas = juego($jugadores, bombo())[1]; // recoger bolasSacadas  
    $contadores = juego($jugadores, bombo())[2]; //recoger contadores

    imprimir($jugadores,$bolasSacadas,$contadores,$ganadores);
    ?>
</body>

</html>