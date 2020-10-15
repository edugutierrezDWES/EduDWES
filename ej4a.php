<HTML>
    <HEAD>
        <TITLE> Arrays 4a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej4a.phpa partir del array definido en el ejercicio anterior crear un nuevo array que almacene los números binarios en orden inverso.-->
        
        <?php
        
      $array=array();//creamos el array vacío
      $arrayInverso=array();    
      $num=0;    
      while (count($array)<20){ 
          array_push($array,decbin($num)); // la funcion array_push() nos añade un elemento al final del array
          $num+=1; // incrementamos +2 para que en la siguiente iteración añade el siguiente impar
      }
                
         echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">&iacutendice</td>
                <td width="100">Orden normal</td>
                <td width="100">Orden inverso</td>
              </tr>
           </table>  ';
        
        $arrayInverso=array_reverse($array); // función para invertir el array
           
        foreach ($array as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
            
            
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
                <td width="100">'.($arrayInverso[$x]).'</td>
              </tr>
           </table>  ';
           // en la última columna tenemos que pasar el arrayInverso con el índice del bucle en cada iteración para que imprima
          // el elemento que ocupa esa posición
        }

        ?>
    </BODY>
</HTML>