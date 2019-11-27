<?php
$message='';

if (isset($_GET['id'])){
        $id=intval($_GET['id']);
    } else {
        header("location:opcion_contactos.php");
}
    
?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>Programación Orientada a Objetos - Actualizar en la Base de Datos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                    <div class="col-sm-8"><h2>Actualizar <b>Contactos</b></h2></div>

                </div>
            </div>
 			
 			       
            <?php
				//código para actualizar la tabla proveedores
				include ('../conexion.php');
				$contactos= new basedatos();
				if(isset($_POST) && !empty($_POST)){
					//se limpian las variables
					$nombre_con = $contactos->limpiar_cadena($_POST['nombre_con']);
					$descripcion_con = $contactos->limpiar_cadena($_POST['descripcion_con']);
					$cli_id_con = $contactos->limpiar_cadena($_POST['cli_id_con']);
					$id_con=intval($_POST['id_con']);
					$res = $contactos->actualizar_contactos($id_con, $nombre_con, $descripcion_con, $cli_id_con);

					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success alerta";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger alerta";
					}

				}
				//consultar el dato del registro específico por el ID que se va a actualizar
				$datos_contactos=$contactos->seleccionar_contactos($id);
			?>
				<!-- Se crea un DIV y se le asigna la clase, y se imprime el mensaje -->
				<div class="<?php echo $class?>">
				  <?php 
				  echo $message;
				  ?>
				</div>	

			<div class="row">
				<!-- el método post envia los datos capturados en un formulario de manera incognita, aqui se van a actualizar los datos -->
				<form method="post">
				<div class="col-md-12">
					<label>Nombre del Usuario:</label><br>
					<input type="text" name="nombre_con" id="nombre_con" class='form-control alerta' size="30" maxlength="30" required required value="<?php echo $datos_contactos->con_nombre;?>" >
                    			<label>Mensaje:</label><br>
					<input type="text" name="descripcion_con" id="descripcion_con" class='form-control alerta' size="30" maxlength="30" required required value="<?php echo $datos_contactos->con_descripcion;?>">
                    			<label>Código del Cliente:</label><br>
					<input type="text" name="cli_id_con" id="cli_id_con" class='form-control alerta' size="30" maxlength="30" required required value="<?php echo $datos_contactos->con_cli_id;?>">
                    <!--En es input se carga el ID del proveedor y se esconde la caja de texto -->
					<input type="hidden" name="id_con" id="id_con" class='form-control alerta' size="30" maxlength="30" required value="<?php echo $datos_contactos->con_id;?>" >
				</div>
								
				<div class="col-md-12 pull-right">
				<br>
					<button type="submit" class="btn btn-success">Actualizar contactos</button>
					<a href="opcion_contactos.php" class="btn btn-warning">Regresar</a>
				</div>
				</form>
			</div>
        </div>
    </div>    
     </div>  
</body>
</html>