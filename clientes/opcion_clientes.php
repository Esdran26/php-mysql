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
        <div  class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Clientes</b></h2></div>

                </div>
            </div>
            <table id="tblData" class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE DEL CLIENTE</th>
                        <th>ACCIONES</th>
                </thead>
                <tbody>    

                        <?php 

                            $clientes = new basedatos();
                            $listado=$clientes->leer_clientes();

                        while ($row=mysqli_fetch_object($listado)){
                            $id=$row->cli_id;
                            $nombre=$row->cli_nombre;
                            ?>
                            <tr>
                            <td><?php echo $nombre;?></td>
                            <td>
                            <a href="actualizar_clientes.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="eliminar_clientes.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE92B;</i></a>
                            </td>
                            </tr>   
                        <?php
                        }
                        ?>

                </tbody>
            </table>
                    <div style="padding-bottom: 20px;" class="col-sm-6">
                        <a href="insertar_clientes.php" class="btn btn-success add-new">Agregar Cliente</a>
                        <a href="../menu.php" class="btn btn-warning">Regresar</a>
                        <input style="margin-left: 15px;" type="button" class="btn btn-info" value="Descargar Reporte Clientes" onclick="exportTableToExcel('tblData','RegistroClientes')" >
                    </div>
        </div>
    </div>     
    <script src="script.js"></script>
</body>
</html>