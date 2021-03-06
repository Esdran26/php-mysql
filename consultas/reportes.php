<?php 
   include ('../conexion.php');

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">

</head>
<body style="background-image: url('../img/fondo2.jpg');
    background-repeat: no-repeat;
    background-size: cover;">
    <div class="container" style="background-color: white;
    opacity: 0.9;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12"><h2>Listado de  <b>Consulta con JOIN</b></h2>
                        <h4>Se ha seleccionado el pedido con su descripción y los productos con sus precios y descripción del cliente llamada "Martha".</h4>
                    </div>

                </div>
            </div>
            <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE DEL PEDIDO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>NOMBRE DEL PRODUCTO</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCIÓN</th>
                </thead>
                <tbody>    

                        <?php 

                            $join = new basedatos();
                            $listado=$join->leer_join();

                        while ($row=mysqli_fetch_object($listado)){
                            $pednombre=$row->ped_nombre;
                            $peddescripcion=$row->ped_descripcion;
                            $prodnombre=$row->prod_nombre;
                            $prodprecio=$row->prod_precio;
                            $proddescripcion=$row->prod_descripcion;
                        
                            ?>
                            <tr>
                            <td><?php echo $pednombre;?></td>
                            <td><?php echo $peddescripcion;?></td>
                            <td><?php echo $prodnombre;?></td>
                            <td><?php echo $prodprecio;?></td>
                            <td><?php echo $proddescripcion;?></td>
                            
                            </tr>   
                        <?php
                        }
                        ?>

                </tbody>
            </table>
            <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12"><h2>Listado de  <b>Subconsultas</b></h2>
                        <h4>Se ha seleccionado todos los pedidos que no tengan la palabra "Productos" con el usuario de contacto con su descripcion del cliente llamado "Alex".</h4>
                    </div>
                </div>
            </div>
            <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE DEL USUARIO DE CONTACTO</th>
                        <th>DESCRIPCIÓN</th>
                </thead>
                <tbody>    

                        <?php 

                            $subconsulta = new basedatos();
                            $listado=$subconsulta->leer_subconsulta();

                            while ($row=mysqli_fetch_object($listado)){
                                $connombre=$row->con_nombre;               
                                $condescripcion=$row->con_descripcion;
                        
                        ?>
                                <tr>
                                <td><?php echo $connombre;?></td>
                                <td><?php echo $condescripcion;?></td>
                            
                                </tr>   
                        <?php
                            }
                        ?>

                </tbody>
            </table>
            <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12"><h2>Listado de  <b>Consultas de Agrupación</b></h2>
                        <h4>Consulta del producto con el mayor precio de toda la tienda.</h4>
                    </div>
                </div>
            </div>
            <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE DEL PRODUCTO</th>
                        <th>EXISTENCIAS</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCIÓN</th>
                </thead>
                <tbody>    

                        <?php 

                            $agrupacion = new basedatos();
                            $listado=$agrupacion->leer_agrupacion();

                            while ($row=mysqli_fetch_object($listado)){
                                $prodnombre=$row->prod_nombre;
                                $prodexistencias=$row->prod_existencias;
                                $prodprecio=$row->prod_precio;    
                                $proddescripcion=$row->prod_descripcion;
                        
                        ?>
                                <tr>
                                <td><?php echo $prodnombre;?></td>
                                <td><?php echo $prodexistencias;?></td>
                                <td><?php echo $prodprecio;?></td>
                                <td><?php echo $proddescripcion;?></td>
                            
                                </tr>   
                        <?php
                            }
                        ?>

                </tbody>
            </table>
            </div>
            <div style="padding-bottom: 20px;" class="col-sm-6">
                <a href="../menu.php" class="btn btn-warning">Regresar</a>
            </div>
    </div>   
                    
         
    
</body>
</html>