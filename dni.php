<HTML>
<HEAD> <TITLE>Letra NIF </TITLE> </HEAD>

<BODY>
<?php
 
$dni="12345678";$DNI=$dni;settype($dni, "integer");
$letras="TRWAGMYFPDXBNJZSQVHLCKE";    
$letras = $letras[$dni%23];

echo $DNI."-".$letras;
      
?>
</BODY>
</HTML>