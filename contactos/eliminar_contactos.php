<?php 
if (isset($_GET['id'])){
	include ('../conexion.php');
	$contactos = new basedatos();
	$id=intval($_GET['id']);
	$res = $contactos->eliminar_contactos($id);
	if($res){
	
		echo'<script type="text/javascript">
    	alert("Registro  eliminado correctamente");
   		window.location.href="opcion_contactos.php";
    	</script>';


	}else{
		echo "Error al eliminar el registro de contacto";
	}
}
?>