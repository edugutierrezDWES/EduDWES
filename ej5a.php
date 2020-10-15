<HTML>
    <HEAD>
        <TITLE> Arrays 5a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- Programa ej5a.phpdefinir tres arrays con los siguientes valores relativos a módulos que se imparten en el ciclo DAW:“Bases Datos”, “Entornos Desarrollo”, “Programación”“Sistemas Informáticos”,”FOL”,”Mecanizado”“Desarrollo Web ES”,”Desarrollo Web EC”,”Despliegue”,”Desarrollo Interfaces”, “Inglés”
       Se pide:
        a.Unir los 3 arrays en uno único sin utilizar funciones de arrays 
        b.Unir los 3 arrays en uno único usando la función array_merge()
        c.Unir los 3 arrays en uno único usando la función array_push()
       -->
        
        <?php
        
      $array1=array("Bases de Datos", "Entornos de Desarrollo", "Programacion");
      $array2=array("FOL", "Mecanizado");
      $array3=array("DWES", "DWEC", "DAW", "DIW", "Ingles");
        
        //a)
      echo "Apartado a </br></br>"; 
        
      // asginamos cada valor a cada posición manualmente.    
      $array1[3]=$array2[0];$array1[4]=$array2[1];$array1[5]=$array3[0];$array1[6]=$array3[1];
      $array1[7]=$array3[2];$array1[8]=$array3[3];$array1[9]=$array3[4];
        
       foreach ($array1 as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
             
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
              </tr>
           </table>  ';
       }
        
        //b
      echo "</br> Apartado b </br></br>";    
      $array1=array("Bases de Datos", "Entornos de Desarrollo", "Programacion");
      $array2=array("FOL", "Mecanizado");
      $array3=array("DWES", "DWEC", "DAW", "DIW", "Ingles");
        
      // funcion array_merge() para unir todos los arrays directamente      
      $arrayUnico=array_merge($array1, $array2, $array3);    
        
      foreach ($arrayUnico as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
             
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
              </tr>
           </table>  ';
       }
        
      //c       
      echo "</br> Apartado c </br></br>";    
      $array1=array("Bases de Datos", "Entornos de Desarrollo", "Programacion");
      $array2=array("FOL", "Mecanizado");
      $array3=array("DWES", "DWEC", "DAW", "DIW", "Ingles");
        
      //Metemos al final del array1 los elementos del array2 y array3 respectivamente    
      array_push($array1, $array2[0], $array2[1], $array3[0], $array3[1], $array3[2], $array3[3], $array3[4] );
      foreach ($array1 as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla
             
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