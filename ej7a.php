<HTML>
    <HEAD>
        <TITLE> Arrays 7a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- 
       Programa ej7a.php crear un array asociativo con los nombres de 5  alumnos y la edad  de cada uno de ellos. 
       Se pide: a.Mostrar el contenido del array utilizando bucles.
                b.Sitúa el puntero en la segunda posición del array y muestra su valor
                c.Avanza una posición y muestra el valor
                d.Coloca el puntero en la última posición y muestra el valor
                e.Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del array y la última.
       -->
        <?php

        $clase=array("Edu"=>25,"Miguel"=>22,"Lucas"=>23,"Daniel"=>22,"Rodrigo"=>20);
        $clase2=$clase;
        
        //a
        foreach ($clase as $x => $x_value){ // recorremos el array para imprimirlo directamente en la tabla 
        echo' <table style="text-align:center" border="1">
              <tr>
                <td width="100">'.$x.'</td>
                <td width="100">'.$x_value.'</td>
              </tr>
           </table>  ';
       }
        
         //b
         // el puntero se sitúa en la primera posición y para ir a la segunda lo hacemos con next()
    
         echo "</br> Valor del elemento en la segunda posicion: ".next($clase2)."</br>";

        //c para ir a la siguiente next()

        echo "</br> Valor del elemento en la tercera posicion: ".next($clase2)."</br>";
        
        //d
        // para colocarlo al final utilizamos la función end()
        
        echo "</br> Valor del elemento en la ultima posicion: ".end($clase2)."</br></br>";
        
        //e
        //ordenamos el array con la función asort para mantener el índice
        
        asort($clase, SORT_NUMERIC);
        // para el primer elemento reset()
        echo "</br> Valor del elemento en la primera posicion: ".reset($clase)."</br></br>";
        echo "</br> Valor del elemento en la ultima posicion: ".end($clase)."</br></br>";
        
        
        ?>
    </BODY>
</HTML>