<?php

include_once 'conexion.php';

function comprobarCliente($usuario, $clave){
    # Función 'comprobarCliente'. 
    # Parámetros: 
    # 	- $usuario (usuario del cliente)
    #	- $clave (clave del cliente)
    #
    # Funcionalidad:
    # Comprobar que existe un cliente con ese $usuario y $clave
    #
    # Retorna: Los datos (USERNAME) del Cliente / NULL si no existe el cliente o ha ocurrido un error
    #
    # Código por Edu Gutierrez
            global $conexion;
        
            try {
                $consulta = $conexion->prepare("SELECT username, passcode FROM admin WHERE username = :usuario and passcode=:clave");
                $consulta->bindParam(":usuario", $usuario);
                $consulta->bindParam(":clave", $clave);
                $consulta->execute();
                $datos = $consulta -> fetch(PDO::FETCH_ASSOC);
        
            
                if($datos["username"]==null || $datos["passcode"]==null){
                    return null;
                }else{
                    return $datos["username"];
                }
        
            } catch (PDOException $ex) {
                echo "<p>Ha ocurrido un error al devolver los datos del cliente que se busca por este NIF: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
                return null;
            }
        }

function obtenerNombre($usuario){
        
    # Función 'obtenerNombre'. 
    # Parámetros: 
    # 	- $usuario (usuario del cliente)
    # Funcionalidad:
    # Obtener el nombre del cliente que ha iniciado sesión a partir de su username
    #
    # Retorna: Los datos (CUSTOMERNAME) del Cliente / NULL si no existe el cliente o ha ocurrido un error
    #
    # Código por Edu Gutierrez
    
    global $conexion;
    try {
        $consulta = $conexion->prepare("SELECT customerName FROM customers LEFT JOIN admin ON customers.customerNumber=admin.id WHERE admin.username=:usuario");
        $consulta->bindParam(":usuario",$usuario);
        $consulta->execute();

        $datos = $consulta -> fetch(PDO::FETCH_ASSOC);
        return $datos;
    } catch (PDOException $ex) {
        echo "<p>Ha ocurrido un error al devolver los datos del cliente que se busca por este username: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}        


?>