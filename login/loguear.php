<?php
require 'conexion.php';

session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$q = "SELECT count(*) as contar  from usuarios where usu_usuario = '$usuario' and usu_clave = '$contraseña'";

$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar'] > 0) {
          $_SESSION['username'] = $usuario;
          header("location: ../menu.php");
}
else {
          echo "Error, los datos son incorrectos";
}


?>