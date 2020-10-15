<HTML>
    <HEAD>
        <TITLE> Arrays 2a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej2a.php modificar el ejemplo anterior para que calcule la media de los valores que están en las posiciones pares y las posiciones impares-->
        
        <?php
        
      $array=array(); //creamos el array vacío
      $num=1;$suma_p=0;$suma_imp=0;    
      while (count($array)<20){ 
          array_push($array,$num); // la funcion array_push() nos añade un elemento al final del array
          $num+=2; // incrementamos +2 para que en la siguiente iteración añade el siguiente impar
      }
           
        foreach ($array as $x => $x_value){ // recorremos el array para acumular los n
        
            if ($x%2==0){
                $suma_p+=$x_value;
            } else {
                $suma_imp+=$x_value;
            }
        }
        
        
        echo "La media de los valores en las posiciones pares es: ".($suma_p/(count($array)/2))."<br>";
        echo "La media de los valores en las posiciones impares es: ".($suma_imp/(count($array)/2))."<br>";

        ?>
    </BODY>
</HTML>