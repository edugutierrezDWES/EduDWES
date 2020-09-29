<HTML>
<HEAD> <TITLE> STRING </TITLE> </HEAD>

<BODY>
<?php
    
 $ip="1.3.7.0";
 $IP=$ip;   
     
    
 $ip1=substr($ip, 0, strpos($ip,"."));
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
    
 $ip2=substr($ip, 0, strpos($ip,"."));
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
 
 $ip3=substr($ip, 0, strpos($ip,"."));
 $ip=substr($ip, strpos($ip,".")+1, strlen($ip)-1);
    
 $ipb="%b";
    
 echo "IP : ".$IP." en binario es: ";  
    
 echo sprintf($ipb, $ip1);echo ".";
 echo sprintf($ipb, $ip2);echo ".";
 echo sprintf($ipb, $ip3);echo ".";
 echo sprintf($ipb, $ip);echo;    
    
?>
</BODY>
</HTML>