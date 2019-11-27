<?php
	include ('../conexion.php');
	$message='';
	$class='';
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Programación Orientada a Objetos - Insertar en la Base de Datos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
	<div style="background-color: white;
    opacity: 0.9;" class="ejercicio">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2><br><br>
                    </div>

                </div>
            </div>
 			
 			        <?php
 			        //se crea una nueva instancia
					$clientes= new basedatos();
					//isset() para comprobar si una variable está definida -- !empty si no viene null
					if(isset($_POST) && !empty($_POST)){
						//se limpia la variable $nombre_cat
						$nombre_cli = $clientes->limpiar_cadena($_POST['nombre_cli']);
						//se llama la función insertar y se le pasa el parámetro del nombre de la categoría
						$res = $clientes->insertar_clientes($nombre_cli);
						//si la respuesta
						//si el resultado es true o 1, quiere decir que insertó en la base de datos
						if($res){
							//se configura el mensaje y la clase de bootstrap que se imprimirá
							$message= "Cliente ingresado correctamente";
							$class="alert alert-success alerta"; //cuadro de alerta en color verde
						}else{
							$message="No se pudieron insertar los datos del cliente";
							$class="alert alert-danger"; //cuadro de alerta en color rojo
						}

					}
					?>
				<!-- Se crea un DIV y se le asigna la clase, y se imprime el mensaje -->
				<div class="<?php echo $class?>">
				  <?php 
				  echo $message;
				  ?>
				</div>	


			<div class="row">
				<!-- el método post envia los datos capturados en un formulario de manera incognita -->
				<form method="post">
				<div class="col-md-3">
					<label>Nombre del Cliente:</label><br>
					<input type="text" name="nombre_cli" id="nombre_cli" class='form-control' maxlength="15" required >
				</div>
				
				<div class="col-md-12 pull-right">
				<br>
					<button type="submit" class="btn btn-success">Guardar datos</button>
					<a href="opcion_clientes.php" class="btn btn-warning">Regresar</a>
				</div>
				</form>
			</div>
        </div>
    </div>    
     </div>  
</body>
</html>