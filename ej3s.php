<HTML>
<HEAD> <TITLE> STRING </TITLE> </HEAD>

<BODY>
<?php // Realizado por Edu Gutierrez.
    
 $ip="10.33.15.100/8";
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
 $ip4=substr($ip, 0, strpos($ip,"/"));
 $ip=substr($ip, strpos($ip,"/")+1, strlen($ip)-1);

 //pasamos todas las "ip" a binario
 $ip1=decbin($ip1);$ip2=decbin($ip2);$ip3=decbin($ip3);$ip4=decbin($ip4);

 //ahora las rellenamos con 0 por la izquierda hasta llegar a 0 dígitos

 $ip1=str_pad($ip1, 8, "0", STR_PAD_LEFT);
 $ip2=str_pad($ip2, 8, "0", STR_PAD_LEFT);
 $ip3=str_pad($ip3, 8, "0", STR_PAD_LEFT);
 $ip4=str_pad($ip4, 8, "0", STR_PAD_LEFT);
 $mascara=$ip; 
 $ip=32-$ip; // para calcular los bits que usará el host

 // unimos todas las ip para formar poder eliminar dígitos según la máscara

 $ip5=$ip1.$ip2.$ip3.$ip4;

 // ahora recortamos según la máscara( nuestra variable $ip)
 $ip5=substr($ip5, 0, -$ip);

 // rellenamos de 0 o de 1 por la derecha hasta 32 dígitos para las direcciónes de red o broadcast

$red=str_pad($ip5, 32, "0", STR_PAD_RIGHT);
$broad=str_pad($ip5, 32, "1", STR_PAD_RIGHT);

// volvemos a reutilizar las variables ip para guardar los valores de salida de red.

//primero la de red
$ip1=substr($red, 0, 8);$ip2=substr($red, 8, 8);$ip3=substr($red, 16, 8);$ip4=substr($red, 24, 8);
 
// ahora para la de broadcast tenemos que crear nuevas variables
$ip1b=substr($broad, 0, 8);$ip2b=substr($broad, 8, 8);$ip3b=substr($broad, 16, 8);$ip4b=substr($broad, 24, 8);
 
//pasamos todo a decimal

$ip1=bindec($ip1);$ip2=bindec($ip2);$ip3=bindec($ip3);$ip4=bindec($ip4);
$ip1b=bindec($ip1b);$ip2b=bindec($ip2b);$ip3b=bindec($ip3b);$ip4b=bindec($ip4b);

//imprimimos todo

 echo "IP  ".$IP."<br>"; 
 echo " Máscara ".$mascara."<br>"; 
 echo "Direci&oacuten Red: ".$ip1.".".$ip2.".".$ip3.".".$ip4."<br>";
 echo "Direci&oacuten Broadcast: ".$ip1b.".".$ip2b.".".$ip3b.".".$ip4b."<br>";
 // sumamos 1 al último número de dirección red y restamos 1 a la dirección broadcast para definir el rango
 echo "Rango: ".$ip1.".".$ip2.".".$ip3.".".($ip4+1)." a ".$ip1b.".".$ip2b.".".$ip3b.".".($ip4b-1);

    
?>
</BODY>
</HTML>