<HTML>
    <HEAD>
        <TITLE> Arrays 6a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej6a.php mostrar el array resultante del ejercicio anterior en orden inverso. Previamente, 
       se deberá borrar el módulo mecanizado que no se imparte en el ciclo DAW.
       -->
        
        <?php
        
      echo "</br> Array invertido </br></br>";    
      $array1=array("Bases de Datos", "Entornos de Desarrollo", "Programacion");
      $array2=array("FOL", "Mecanizado");
      $array3=array("DWES", "DWEC", "DAW", "DIW", "Ingles");
        
      // funcion array_merge() para unir todos los arrays directamente      
      $arrayUnico=array_merge($array1, $array2, $array3);    
      $arrayInverso=array_reverse($arrayUnico);
      //buscamos la posición de "Mecanizado"
      $posMec=array_search("Mecanizado",$arrayInverso);
      // y la borramos con la función unset
      unset($arrayInverso[$posMec]);
      // y la función array_values para reordenar
      $arrayInverso=array_values($arrayInverso);
        
      foreach ($arrayInverso as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
             
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
              </tr>
           </table>  ';
       }
        ?>
    </BODY>
</HTML>