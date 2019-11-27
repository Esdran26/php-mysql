<?php 
if (isset($_GET['id'])){
	include ('../conexion.php');
	$clientes = new basedatos();
	$id=intval($_GET['id']);
	$res = $clientes->eliminar_clientes($id);
	if($res){
	
		echo'<script type="text/javascript">
    	alert("Registro  eliminado correctamente");
   		window.location.href="opcion_clientes.php";
    	</script>';


	}else{
		echo "Error al eliminar el registro de la categoría";
	}
}
?>