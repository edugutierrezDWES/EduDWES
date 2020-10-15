<HTML>
    <HEAD>
        <TITLE> Arrays 3a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej3a.php definir un array y almacenar los 20 primeros números binarios. Mostrar en la salida una tabla como la de la figura-->
        
        <?php
        
      $array=array(); //creamos el array vacío
      $num=0;    
      while (count($array)<20){ 
          array_push($array,decbin($num)); // la funcion array_push() nos añade un elemento al final del array
          $num+=1; // incrementamos +2 para que en la siguiente iteración añade el siguiente impar
      }
        
         echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">&iacutendice</td>
                <td width="100">Binario</td>
                <td width="100">Octal</td>
              </tr>
           </table>  ';
           
        foreach ($array as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
            
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
                <td width="100">'.(decoct(bindec($x_value))).'</td>
              </tr>
           </table>  ';
           // en la última columna tenemos que pasar de binario a decimal para luego pasarlo a octal con la
           // función decoct
        }

        ?>
    </BODY>
</HTML>