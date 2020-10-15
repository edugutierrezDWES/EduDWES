<HTML>
    <HEAD>
        <TITLE> Arrays 1a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej1a.php: definir un array y almacenar los 20 primeros números impares. 
        Mostrar en la salida una tabla como la de la figura-->
        
        <?php
        
      $array=array(); //creamos el array vacío
      $num=1;    
      while (count($array)<20){ 
          array_push($array,$num); // la funcion array_push() nos añade un elemento al final del array
          $num+=2; // incrementamos +2 para que en la siguiente iteración añade el siguiente impar
      }
        
         echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">&iacutendice</td>
                <td width="100">Valor</td>
                <td width="100">Suma</td>
              </tr>
           </table>  ';
           
        foreach ($array as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
            
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
                <td width="100">'.($x+$x_value).'</td>
              </tr>
           </table>  ';
           
        }

        ?>
    </BODY>
</HTML>