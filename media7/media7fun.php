<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 y media</title>
</head>

<body>

    <?php

     //datos formulario
    function datos(){
        echo "Cartas a repartir :" . $_POST["numcartas"] . ".</br>";
        echo "Cantidad apostada :" . $_POST["apuesta"] . "€.</br></br>";
    }
     
    
    // genarar cartas
    function generarCartas()
    {
        $cartas = array(
            "1C", "1D", "1P", "1T", "2C", "2D", "2P", "2T", "3C", "3D", "3P", "3T", "4C", "4D", "4P", "4T", "5C", "5D", "5P", "5T", "6C", "6D", "6P", "6T",
            "7C", "7D", "7P", "7T", "JC", "JD", "JP", "JT", "QC", "QD", "QP", "QT", "KC", "KD", "KP", "KT"
        );
        // barajar las cartas
        shuffle($cartas);
        return $cartas;
    }

    //asignar cartas a cada jugador
    function asignarCartas($cartas)
    {
        $cartasJugador = array();
        for ($i = 0; $i < $_POST["numcartas"]; $i++) {
            //repartir n cartas a un jugador
            array_push($cartasJugador, array_pop($cartas));
        }
        return array($cartasJugador, $cartas);
    }

    //calcular puntuación de cada jugador
    function puntuacion($jugador)
    {
        $punt = 0.0;
        for ($i = 0; $i < $_POST["numcartas"]; $i++) {
            // recoger SOLO el valor de la carta 
            $aux = substr($jugador[$i], 0, 1);
            if ($aux == "K" || $aux == "J" || $aux == "Q") {
                $punt += 0.5;
            } else {
                $punt += $aux;
            }
        } return $punt;
    }

    // calcular el ganador según puntuaciones
    function resultados($puntuaciones){
        //ganadores premio max de 50%
        $ganador50=array(false,false,false,false);
        //ganadores premio max de 80%
        $ganador80=array(false,false,false,false);
        // ganadores
        $premiados=array(false,false,false,false);
        $premio=$_POST["apuesta"];
        $cont80=0;
        $cont50=0;

        //número grande para comparar
        $menor=-2020;
        for ($i = 0; $i < 4; $i++) {

            // se marca ganador si es igual a 7.5
              if ($puntuaciones[$i]==7.5){
              $ganador80[$i]=true;
             // se almacena en menor el número más cercano a 7.5
            } else if ($puntuaciones[$i]>$menor && $puntuaciones[$i]<7.5){  
              $menor=$puntuaciones[$i];
              
            } 
        }

        // si no hay ningún 7.5
        if(!in_array(true, $ganador80)){

            for ($i = 0; $i < 4; $i++) {
                // se marca los ganadores igual a menor
                if($puntuaciones[$i]==$menor){
                    $ganador50[$i]=true;
                    // +1 al contador que de los que ganan un max del 50% del premio
                    $cont50++;  
                }                    
            }
            // premio de 50%
            $premio/=2;

            // si no hay ganadores
            if($cont50==0){
                $premio=0;
            } else {
            // premio individual en caso de más de 1 ganador
            $premio/=$cont50;
            $premiados=$ganador50;
            }
            
        } else {

            for ($i = 0; $i < 4; $i++) {

                if($ganador80[$i]){
                    // +1 al contador que de los que ganan un max del 80% del premio
                    $cont80++;
                }
            } 
            // premio 80%
            $premio*=0.8;
            // premio individual en caso de +1 ganador
            $premio/=$cont80;
            $premiados=$ganador80;
        }

        // array boolean con los ganadores y con el premio que recibe cada uno
        return array($premiados, $premio);
    }

    function imprimir($jugadores, $puntuaciones, $resultados)
    {
    $nombres=array($_POST["nombre1"],$_POST["nombre2"],$_POST["nombre3"],$_POST["nombre4"]);
    for ($i=0;$i<4;$i++) {
       // Si es ganador imprime el nombre en la posicion i
        if($resultados[0][$i]){
            echo "<strong>".$nombres[$i]."</strong> ha ganado la partida con <strong>".
            $puntuaciones[$i]."</strong> puntos.<br>";
        }
    }
    
    // se comprueba el mensaje si se reparte dinero o no
    if($resultados[1]==0){
        echo "NO hay ganadores en el bote acumulado de <strong>".$_POST["apuesta"]." €</strong>.<br><br>";
    } else {
        echo "Los jugadores han obtenido <strong>".$resultados[1]." €</strong> de premio.<br><br>";
    }

     //recorrer todos las cartas
     for ($i=0;$i<4;$i++) {

            echo'
         <table class="carton" border="1px, solid">
         <tr>
           <th width="75" height="100">'.$nombres[$i].'</th>';// columna de nombres
           for ($j=0;$j<$_POST["numcartas"];$j++) {
               echo'
           <th><img width="75" height="100" src=./img/' . $jugadores[$i][$j] .
            '.PNG></th>';// filas cartas
           }
           echo'
         </tr>
      </table>  
   </div>';
        }
    }

    function escribirFichero($puntuaciones, $resultados){

        //guardar nombres
        $nombres=array($_POST["nombre1"],$_POST["nombre2"],$_POST["nombre3"],$_POST["nombre4"]);

        // guardar nombre fichero
        //fecha formato ddmmaahhmiss
        $fichero="apuestas_".date("dmYHis").".txt";
        $cont=0;

        //crear fichero y abrirlo
        $f1=fopen($fichero,"w+");

        for ($i=0;$i<4;$i++) {
            // separar los nombres 
            $nombre = explode(" ", $nombres[$i]);
            $iniciales="";
            foreach ($nombre as $unNombre) {
                // recoger inciales cada palabra y concatenarlas
                $iniciales.=substr($unNombre, 0, 1);
            }

            // si no es ganador, escribimos 0 de premio en la línea
            if(!$resultados[0][$i]) {
                $linea=$iniciales."#".$puntuaciones[$i]."#0";
            } else {
                // línea con el premio correspondiente
                $linea=$iniciales."#".$puntuaciones[$i]."#".$resultados[1];
                $cont++;//contamoss los premiados
            }
            //escribir la línea
            fwrite($f1,$linea."\n");
        }
         
        //acumulado premio y escritura última línea
        $premioTotal=$cont*$resultados[1];
        $lineaTotal="TOTALPREMIOS#".$cont."#".$premioTotal;
        fwrite($f1,$lineaTotal);

        //cerrar el fichero
        fclose($f1);
    }

    ?>
</body> 
</html>