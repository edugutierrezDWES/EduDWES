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

        .bombo {
            display: inline-block;
        }

        span{
            text-decoration: underline;
            text-decoration-color: crimson;
            
        }
    </style>
</head>

<body>

    <!--Bingo
       -->

    <?php

    function generarCartones(/*$numCartones*/)
    {

        for ($j = 0; $j < 3/*($numCartones)*/; $j++) { // para crear los 3 cartones

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

        $jugador = array();
        for ($i = 0; $i < 3/*($numCartones)*/; $i++) {
            array_push($jugador, ${"carton" . $i});
        }
        return $jugador;
    }

    function generarJugadores(/*$numJugadores, $numCartones */){

        $jugadores=array();  
        for ($i = 0; $i < 4/*$numJugadores*/ ; $i++) { //generar array jugadores
        ${"jugador" . $i} = generarCartones(/*$numCartones*/); // asignar cartones a cada jugador
            array_push($jugadores, ${"jugador" . $i});
        }

        return $jugadores;
    }

    function bombo()
    {

        for ($i = 1; $i < 61; $i++) { // crear el bombo con valores(1-60)
            $bombo[$i - 1] = $i;
        }
        shuffle($bombo);
        return $bombo;
    }

    function juego($jugadores, $bombo)
    {

        $bola = array_pop($bombo); // quitar último elemento del array
        $bolasSacadas = array();

        for ($i = 0; $i < count($jugadores); $i++) { // crear contadores
            ${"cont" . $i} = array(0, 0, 0);
        }
        $ganadores = array(false, false, false, false); // para indicar quienes han ganado

        while (in_array(true, $ganadores) == false) { // para sacar bolas hasta que alguien gane

            $bola = array_pop($bombo); // para sacar la última bola del bombo
            array_push($bolasSacadas, $bola); // guardar las bolas salidas para imprimirlas luego

            for ($i = 0; $i < count($jugadores); $i++) { // para recorrer cada jugador
                for ($j = 0; $j < count($jugadores[$i]); $j++) {
                    if (in_array($bola, $jugadores[$i][$j])) { // para comprobar si la bola está en cada cartón
                        ${"cont" . $i}[$j]++;
                    }
                }
                // si algún elemento del contador llega a 15, marcamos el array de ganadores como true en la posición correspondiente

                if (in_array(15, ${"cont" . $i})) {
                    $ganadores[$i] = true;
                }
            }

            $contadores = array();
            for ($i = 0; $i < count($jugadores); $i++) { // crear array contadores
                array_push($contadores, ${"cont" . ($i)});
            }
        }

        return array($ganadores, $bolasSacadas, $contadores);
    }

    function imprimir($jugadores, $bolasSacadas, $contadores, $ganadores)
    {

        echo "<h1>Jugadores y cartones<h1>";

        for ($i = 0; $i < count($jugadores); $i++) { //imprimir los jugadores

            echo "<h2>Jugador ".($i+1)."<h2>";

            for ($j = 0; $j < count($jugadores[$i]); $j++) { // imprimir cada cartón

                echo '<div class="cartones">

    <table class="carton" border="1px, solid">
      <tr>
        <td class="vacio" width="75" height="75"></td>
        <td width="75" height="75">' . $jugadores[$i][$j][0] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][1] . '</td>
        <td class="vacio"width="75"height="75"></td>
        <td width="75"height="75">' . $jugadores[$i][$j][2] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][3] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][4] . '</td>
      </tr>

      <tr>
        <td width="75" height="75">' . $jugadores[$i][$j][5] . '</td>
        <td class="vacio" width="75" height="75"></td>
        <td width="75"height="75">' . $jugadores[$i][$j][6] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][7] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][8] . '</td>
        <td class="vacio" width="75"height="75"></td>
        <td width="75"height="75">' . $jugadores[$i][$j][9] . '</td>
        
      </tr>

      <tr>
        <td class="vacio" width="75" height="75"></td>
        <td width="75" height="75">' . $jugadores[$i][$j][10] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][11] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][12] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][13] . '</td>
        <td width="75"height="75">' . $jugadores[$i][$j][14] . '</td>
        <td class="vacio" width="75"height="75"></td>
        
      </tr>
   </table>  
</div>';
            }
        }

        echo "</br>Bolas sacadas </br></br>";

        for ($i = 0; $i < count($bolasSacadas); $i++) {

            echo '<div class="bombo"><img src=./img/' . $bolasSacadas[$i] . '.PNG></div>';
        }

        echo "</br></br>Aciertos de cada jugador </br></br>";
        echo "Jugador 1</br></br>";
        var_dump($contadores[0]);
        echo "Jugador 2</br></br>";
        var_dump($contadores[1]);
        echo "Jugador 3</br></br>";
        var_dump($contadores[2]);
        echo "Jugador 4</br></br>";
        var_dump($contadores[3]);

        echo "Ganadores</br></br>";

        for ($i = 0; $i < count($jugadores); $i++) {
            if ($ganadores[$i]) {
                echo "<span>Jugador " . ($i + 1) . "</span></br>";
            }
        }
        var_dump($ganadores);
    }

    ?>
</body>

</html>