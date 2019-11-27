<?php

	class basedatos{
		private $con;
		private $dbequipo='localhost';
		private $dbusuario='root';
		private $dbclave='';
		private $dbnombre='crud';
		function __construct(){
			$this->conectar();
		}
		public function conectar(){
			$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);
			if(mysqli_connect_error()){
				die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		public function limpiar_cadena($var){
		  $return = mysqli_real_escape_string($this->con, $var);
		  return $return;
		}
	public function insertar_clientes($nombre_cli){
		$sql = "INSERT INTO es_clientes (cli_nombre) VALUES ('$nombre_cli')";
		$resultado = mysqli_query($this->con, $sql);
		if($resultado){
		  	return true;
		}else{
			return false;
	 	}
	}
	public function seleccionar_clientes($id){
		$sql = "SELECT * FROM es_clientes where cli_id=$id ";
		
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}
	public function actualizar_clientes($nombre,$id){
		
		$sql = "UPDATE es_clientes SET cli_nombre='$nombre' WHERE cli_id=$id";
		
		$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
	}
	public function leer_clientes(){
		$sql = "SELECT * FROM es_clientes";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function eliminar_clientes($id){
		$sql = "DELETE FROM es_clientes WHERE cli_id=$id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	} 
	public function leer_contactos(){
		$sql = "SELECT * FROM es_contacto";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function insertar_contactos($nombre_con, $descripcion_con, $cli_id_con){
		$sql = "INSERT INTO es_contacto (con_nombre, con_descripcion, con_cli_id) VALUES ('$nombre_con','$descripcion_con','$cli_id_con')";
		$resultado = mysqli_query($this->con, $sql);
		if($resultado){
		  	return true;
		}else{
			return false;
	 	}
	}
	public function seleccionar_contactos($id){
		$sql = "SELECT * FROM es_contacto where con_id=$id ";
		
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}
	public function actualizar_contactos($id_con, $nombre_con, $descripcion_con, $cli_id_con){
		
		$sql = "UPDATE es_contacto SET con_nombre='$nombre_con', con_descripcion='$descripcion_con', con_cli_id='$cli_id_con' WHERE con_id=$id_con";
		
		$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
	}
	public function eliminar_contactos($id){
		$sql = "DELETE FROM es_contacto WHERE con_id=$id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	} 
	public function leer_join(){
		$sql = "SELECT ped_nombre, ped_descripcion, prod_nombre, prod_precio, prod_descripcion FROM es_clientes JOIN es_pedidos ON cli_id = ped_cli_id JOIN es_productos ON prod_ped_id = ped_id WHERE cli_nombre='Martha'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function leer_subconsulta(){
		$sql = "SELECT con_nombre, con_descripcion FROM es_contacto WHERE con_ped_id IN (SELECT ped_id FROM es_pedidos WHERE  ped_nombre NOT LIKE '%Productos%') and con_cli_id IN (SELECT cli_id FROM es_clientes WHERE cli_nombre='Alex')";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function leer_agrupacion(){
		$sql = "SELECT prod_nombre, prod_existencias, MAX(prod_precio) AS prod_precio, prod_descripcion FROM es_productos";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function insertar_producto($nombre_prod, $existencias_prod, $precio_prod, $categoria_prod, $proveedor_prod){
		$sql = "INSERT INTO productos (prod_nombre, prod_existencias, prod_precio, prod_cat_id, prod_pro_id) VALUES ('$nombre_prod','$existencias_prod','$precio_prod','$categoria_prod','$proveedor_prod')";
		$resultado = mysqli_query($this->con, $sql);
		if($resultado){
		  	return true;
		}else{
			return false;
	 	}
	}
	public function seleccionar_producto($id){
		$sql = "SELECT * FROM productos where prod_id=$id ";
		
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}
	public function actualizar_producto($id_prod, $nombre_prod, $existencias_prod, $precio_prod, $categoria_prod, $proveedor_prod){
		
		$sql = "UPDATE productos SET prod_nombre='$nombre_prod', prod_existencias='$existencias_prod', prod_precio='$precio_prod', prod_cat_id='$categoria_prod', prod_pro_id='$proveedor_prod' WHERE prod_id=$id_prod";
		
		$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
	}
	public function eliminar_producto($id){
		$sql = "DELETE FROM productos WHERE prod_id=$id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
}
?>