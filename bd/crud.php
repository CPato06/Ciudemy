<?php
include_once 'database.php';
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$appat = (isset($_POST['ap_paterno'])) ? $_POST['ap_paterno'] : '';
$apmat = (isset($_POST['ap_materno'])) ? $_POST['ap_materno'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';
$rol = (isset($_POST['tipo_usuario'])) ? $_POST['tipo_usuario'] : '';
$id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO usuarios (nombre, ap_paterno, ap_materno, correo, username, contrasena, tipo_usuario) 
        VALUES('$nombre', '$appat', '$apmat', '$correo', '$username', '$contrasena', '$rol')";			
        $resultado = $conn->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idusuario, nombre, ap_paterno, ap_materno, correo, username, contrasena, tipo_usuario 
        FROM usuario ORDER BY idusuario DESC LIMIT 1";
        $resultado = $conn->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE usuario SET nombre='$nombre', ap_paterno='$appat', ap_materno='$apmat', correo='$correo', username='$username', contrasena='$contrasena', tipo_usuario ='$rol'
        WHERE idusuario='$id' ";		
        $resultado = $conn->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idusuario, nombre, ap_paterno, ap_materno, correo, username, contrasena, tipo_usuario 
        FROM usuario WHERE idusuario='$id' ";       
        $resultado = $conn->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM usuario WHERE idusuario='$id' ";		
        $resultado = $conn->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conn = NULL;