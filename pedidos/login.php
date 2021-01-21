<?php
	session_start();
    include_once("funciones.php");

	if (isset($_POST) && !empty($_POST)) {

		$usuario = $_POST["usuario"];
		$clave = $_POST["clave"];

		$consulta = comprobarCliente($usuario, $clave);

		if($consulta != null){
			$_SESSION["usuario"] = $consulta;
            header("location: home.php"); 
            
		}	
	}
			
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="author" value="Edu Gutierrez" />
</head>
<body>
	<h1>Iniciar Sesión</h1>
	<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<label for="usuario">Usuario:</label>
		<input type="text" name="usuario" required/><br>

		<label for="clave">Contraseña:</label>
		<input type="text" name="clave" required/><br>

		<input type="submit" value="Iniciar Sesión"/>
	</form>
</body>
</html>