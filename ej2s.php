<HTML>
<HEAD> <TITLE> STRING </TITLE> </HEAD>

<BODY>
<?php // Realizado por Edu Gutierrez.
    
 $ip="1.3.7.0";
 $IP=$ip;   
     
    
// extraemos los números hasta el primer punto y lo guardamos    
 $ip1=substr($ip, 0, strpos($ip,".")); 
    
 // reescribimos ip para que sea los números restantes sin el primer punto incluido
 // ponemos strpos + 1 para eliminar el punto y strlen - 1 porque las posiciones empiezan en 0      
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
 
 // repetimos el proceso pero lo guardamos en otra variable ($ip2)     
 $ip2=substr($ip, 0, strpos($ip,"."));
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
 
 $ip3=substr($ip, 0, strpos($ip,"."));
    
 // el valor de ip que queda son los números finales después del último punto.     
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
     
 echo "IP : ".$IP." en binario es: ";  
    
 // utilizamos el método decbin para pasar los números a binario e imprimimos a la vez    
 echo decbin($ip1);echo ".";
 echo decbin($ip2);echo ".";
 echo decbin($ip3);echo ".";
 echo decbin($ip);echo ;    
    
?>
</BODY>
</HTML>