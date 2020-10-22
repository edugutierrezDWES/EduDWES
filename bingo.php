<html>

<head>
    <title> Bingo
    </title>
    <style>
        .carton {

            text-align: center;
            background-color: rgb(98, 197, 228);
            font-size: 50px;
            color: black;
            margin: 10px;
        }

        .vacio {

            background-color: dimgray;

        }

        .bombo{

            display: flexbox;
        }
    </style>
</head>

<body>

    <!--Bingo
       -->

    <?php

    for ($i = 1; $i < 5; $i++) { // para crear los jugadores

        for ($j = 1; $j < 4; $j++) { // para crear los 3 cartones

            ${"carton" . $j} = array(rand(1, 65)); //reiniciar los cartones
            for ($k = 0; $k < 14; $k++) {
                $random = rand(1, 60);
                // comprobar que no se repite número
                while (in_array($random, ${"carton" . $j})) {
                    $random = rand(1, 60);
                }
                array_push(${"carton" . $j}, $random); // añadir los números al cartón
            }
        }
        // añadir los 3 cartones a cada jugador
        ${"jugador" . $i} = array($carton1, $carton2, $carton3);
    }
    for ($i = 1; $i < 61; $i++) { // crear el bombo con valores(1-60)
        $bombo[$i - 1] = $i;
    }
    shuffle($bombo); // desordenar el bombo

    $bola = array_pop($bombo); // quitar último elemento del array
    $bolasSacadas = array();

    // contar los números salidos de cada cartón de cada jugador
    $cont1 = array(0, 0, 0);
    $cont2 = array(0, 0, 0);
    $cont3 = array(0, 0, 0);
    $cont4 = array(0, 0, 0);

    $ganadores = array(false, false, false, false); // para indicar quienes han ganado

    while (in_array(true, $ganadores) == false) { // para sacar bolas hasta que alguien gane

        $bola = array_pop($bombo); // para sacar la última bola del bombo
        array_push($bolasSacadas, $bola); // guardar las bolas salidas para imprimirlas luego

        for ($i = 1; $i < 5; $i++) { // para recorrer cada jugador
            for ($j = 0; $j < 3; $j++) {
                if (in_array($bola, ${"jugador" . $i}[$j])) { // para comprobar si la bola está en cada cartón
                    ${"cont" . $i}[$j]++;
                }
            }
    // si algún elemento del contador llega a 15, marcamos el array de ganadores como true en la posición correspondiente
        
            if (in_array(15, ${"cont" . $i})) {
                $ganadores[$i - 1] = true;
            }
        }
    }

    echo "<h1>Jugadores y cartones<h1>";

    for ($i = 1; $i < 5; $i++) { //imprimir los jugadores

        echo "<h2>Jugador $i<h2></br>";

        for ($j = 0; $j < 3; $j++) { // imprimir cada cartón

            echo '<div class="cartones">

    <table class="carton" border="1px, solid">
      <tr>
        <td class="vacio" width="75" height="75"></td>
        <td width="75" height="75">' . ${"jugador" . $i}[$j][0] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][1] . '</td>
        <td class="vacio"width="75"height="75"></td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][2] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][3] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][4] . '</td>
      </tr>

      <tr>
        <td width="75" height="75">' . ${"jugador" . $i}[$j][5] . '</td>
        <td class="vacio" width="75" height="75"></td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][6] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][7] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][8] . '</td>
        <td class="vacio" width="75"height="75"></td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][9] . '</td>
        
      </tr>

      <tr>
        <td class="vacio" width="75" height="75"></td>
        <td width="75" height="75">' . ${"jugador" . $i}[$j][10] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][11] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][12] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][13] . '</td>
        <td width="75"height="75">' . ${"jugador" . $i}[$j][14] . '</td>
        <td class="vacio" width="75"height="75"></td>
        
      </tr>
   </table>  
</div>';
        }
    }

    /*
var_dump($jugador1)."</br>";
echo"Jugador 2</br></br>";
var_dump($jugador2)."</br>";
echo"Jugador 3</br></br>";
var_dump($jugador3)."</br>";
echo"Jugador 4</br></br>";
var_dump($jugador4)."</br>";
*/
    echo "</br>Bolas sacadas </br></br>";

    for($i=0;$i<count($bolasSacadas);$i++){
        echo '<div class="bombo"><img src=./img/'.($i+1).'.PNG></div>';
    }
    
    echo "Aciertos de cada jugador </br></br>";
    echo "Jugador 1</br></br>";
    var_dump($cont1);
    echo "Jugador 2</br></br>";
    var_dump($cont2);
    echo "Jugador 3</br></br>";
    var_dump($cont3);
    echo "Jugador 4</br></br>";
    var_dump($cont4);

    echo "Ganadores</br></br>";

    for ($i = 0; $i < 4; $i++) {
        if ($ganadores[$i]) {
            echo "Jugador" . ($i + 1) . "</br>";
        }
    }
    var_dump($ganadores);


    ?>
</body>

</html>