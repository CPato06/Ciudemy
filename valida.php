<?php
$correo = $_POST['correo'];
$password = $_POST['contrasena'];
session_start();
$_SESSION['correo'] = $correo;

$conexion = mysqli_connect("localhost", "root", "", "ciudemy2");

$consulta = "SELECT * FROM usuario where correo = '$correo' AND contrasena = '$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if($filas['tipo_usuario_idusuario'] == 2){
    header("location: admin_dash.php");
}else
    if($filas['tipo_usuario_idusuario'] == 1){
        header("location: index.php");     
    }
    ?>
    <?php
mysqli_free_result($resultado);
mysqli_close($conexion);
