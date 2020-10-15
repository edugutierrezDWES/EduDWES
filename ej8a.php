<HTML>
    <HEAD>
        <TITLE> Arrays 8a
        </TITLE>
    </HEAD>
    <BODY>
        
       <!-- 
      Programa ej8a.php crear un arrayasociativo con los nombres de 5 alumnos y 
      la notade cada uno deellosen Bases Datos.
      Se pide: a.Mostrar el alumno con mayor nota.
               b.Mostrar el alumno con menor nota.
               c.Media notas obtenidas por los alumnos
       -->
        <?php
          
         //a
         $clase=array("Edu"=>8,"Miguel"=>6,"Lucas"=>7,"Daniel"=>9,"Rodrigo"=>9);
         // ordena el array de manera ascendente
         asort($clase, SORT_NUMERIC);
        
         // nos situamos en la úlima posición
         $nota_max=end($clase);
        
         //array vacío
          $alumnos_max=array();
          foreach ($clase as $x => $x_value){ 
              
              // guardamos en otro array los alumnos con la nota máxima
              if($x_value==$nota_max){
                  array_push($alumnos_max, $x);
              }  
          }
        //imprimimos el array de alumnos
        echo"Alumno(s) con la mayor nota (".$nota_max."): </br></br>";
        var_dump($alumnos_max);
        
        //b
        // nos situamos en la primera posición y guardamos la nota mínima
        $nota_min=reset($clase);
        //array vacío
        $alumnos_min=array();
        
        foreach ($clase as $x => $x_value){ 
              
              // guardamos en otro array los alumnos con la nota mínima
              if($x_value==$nota_min){
                  array_push($alumnos_min, $x);
              }  
          }
        
        echo"Alumno(s) con la menor nota (".$nota_min."): </br></br>";;
        var_dump($alumnos_min);
        
        //c
        $suma=0;
        foreach ($clase as $x => $x_value){ 
              
              $suma+=$x_value;
          }
        
        var_dump($clase);
        echo "La media de las notas es:  ".($suma/(count($clase)/2));
        
    
        ?>
    </BODY>
</HTML>