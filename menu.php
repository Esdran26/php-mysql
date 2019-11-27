<?php

session_start();
$usuario = $_SESSION['username'];

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Programación Orientada a Objetos - Insertar en la Base de Datos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilos.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="ejercicio">
    
			<center><img width="200" src="img/logo-emp.jpg"></center><br>
            <center>
			<button type="button" class="btn btn-default btn-block" onclick="window.location.href='clientes/opcion_clientes.php' ">Gestionar Clientes</button>
			<br>
			<button type="button" class="btn btn-default  btn-block"  onclick="window.location.href='contactos/opcion_contactos.php'">Gestionar Contactos</button>
			<br>
			<button type="button" class="btn btn-default  btn-block"  onclick="window.location.href='consultas/reportes.php'">Consulta a 3 tablas</button>
			<br>
			<button type="button" class="btn btn-default  btn-block" onclick="window.location.href='modelo/modelo_relacional.php'" >Modelo Relacional</button>
			<br>
			<a href="login/logout.php" type="button" class="btn btn-info  btn-block"  >Cerrar Sesión</a>
			</center>

        </div>
    </div>    

</body>
</html>