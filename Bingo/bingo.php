<HTML>
    <HEAD>
        <TITLE> Bingo
        </TITLE>
    </HEAD>
    <BODY>
        
       <!--Bingo
       -->
        
        <?php

for($i=1;$i<5;$i++){// para crear los jugadores

    for($j=1;$j<4;$j++){// para crear los 3 cartones
         
        ${"carton".$j}=array(rand(1,65));//reiniciar los cartones
        for($k=0;$k<14;$k++){
            $random=rand(1,60);
            // comprobar que no se repite número
            while(in_array($random, ${"carton".$j})) {
                $random=rand(1,60);
            }
            array_push(${"carton".$j}, $random);// añadir los números al cartón
         }
      }
       // añadir los 3 cartones a cada jugador
      ${"jugador".$i}=array($carton1,$carton2,$carton3);  
}
        for($i=1;$i<61;$i++){ // crear el bombo con valores(1-60)
            $bombo[$i-1]=$i;
        }
        shuffle($bombo); // desordenar el bombo

        $bola=array_pop($bombo);
        $bolasSacadas=array(); // quitar último elemento del array

        // contar los números salidos de cada cartón de cada jugador

        $cont1=array(0,0,0);
        $cont2=array(0,0,0);
        $cont3=array(0,0,0);
        $cont4=array(0,0,0);

     for($k=0;$k<3;$k++){ // para sacar 3 bolas 
           
        $bola=array_pop($bombo);
        array_push($bolasSacadas, $bola);
        
         for($i=1;$i<5;$i++){// para recorrer cada jugador
             for($j=0;$j<3;$j++){
               if(in_array($bola,${"jugador".$i}[$j])){
                  ${"cont".$i}[$j]++;
          }
      }
   }
}
        
echo"Jugadores y cartones </br></br>";
echo"Jugador 1</br></br>";
var_dump($jugador1)."</br>";
echo"Jugador 2</br></br>";
var_dump($jugador2)."</br>";
echo"Jugador 3</br></br>";
var_dump($jugador3)."</br>";
echo"Jugador 4</br></br>";
var_dump($jugador4)."</br>";

echo"Bolas sacadas </br></br>";

var_dump($bolasSacadas);

echo"Aciertos de cada jugador </br></br>";
echo"Jugador 1</br></br>";
var_dump($cont1);
echo"Jugador 2</br></br>";
var_dump($cont2);
echo"Jugador 3</br></br>";
var_dump($cont3);
echo"Jugador 4</br></br>";
var_dump($cont4);    
        
    
        ?>
    </BODY>
</HTML>