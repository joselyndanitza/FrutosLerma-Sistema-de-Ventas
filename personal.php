<?php
    require 'funciones7.php';
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('location: login.php');
    }
    $mensaje='';
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }

    $consulta = $conexion -> prepare("SELECT * FROM Personal");

    $consulta ->execute();
    $consulta = $consulta ->fetchAll();
    if(!$consulta){
        $mensaje .= 'NO HAY DATOS PARA MOSTRAR';
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Meta Tags Requeridos -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sistema de Ventas - Ferma Frutos</title>
        <!-- Hojas de Estilos Requeridos -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/iconfonts/ionicons/css/ionicons.css">
        <link rel="stylesheet" href="vendors/iconfonts/typicons/src/font/typicons.css">
        <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="css/shared/style.css">
        <link rel="stylesheet" href="css/demo_1/style.css">
        <link rel="stylesheet" href="sweetalert2.min.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php include('partial/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include('partial/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <!-- Page Title Header Starts-->
                        <div class="row page-title-header">
                            <div class="col-12">
                                <div class="page-header">
                                    <h4 class="page-title">Menú > Personal > Detalle Personal</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page Title Header Ends-->
                        <!-- <div class="main-panel">-->
                        <div class="col-12">
                            <div class="content-wrapper">
                                <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Listado de Personal</h4>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID Personal</th>
                                                        <th>Nombres Completos</th>
                                                        <th>DNI</th>
                                                        <th>Cargo</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>    
                                                <?php
                                                foreach ($consulta as $Sql): ?>
                                                <tr>
                                                    <?php echo "<td>". $Sql['idPersonal']. "</td>"; ?>
                                                    <?php echo "<td>". $Sql['Nombres']." ".$Sql['Apellidos']. "</td>"; ?>
                                                    <?php echo "<td>". $Sql['Dni']. "</td>"; ?>
                                                    <?php echo "<td>". $Sql['Cargo']. "</td>"; ?>
                                                    <?php echo "<td>"."<a href='actualizarpersonal.php?idPersonal=".$Sql['idPersonal']."' class='btn btn-warning btn-sm'>Editar<i class='fa fa-pencil' aria-hidden='true'></i></a>"; ?>
                                                    <?php echo "<a href='borrarpersonal.php?idPersonal=".$Sql['idPersonal']."' class='btn btn-danger btn-sm'>Borrar<i class='fa fa-trash' aria-hidden='true'></i></a>". "</td>"; ?>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                                <?php  if(!empty($mensaje)): ?>
                                                    <div class="alert alert-danger">
                                                        <p><b> Error - </b> <?php echo $mensaje; ?></p>
                                                    </div>
                                                <?php  endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php include('partial/footer.php'); ?>
                    <!-- partial -->
            </div>
                <!-- main-panel ends -->
            <!-- page-body-wrapper ends -->
        </div>
        <!-- JS Requeridos -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <script src="js/shared/off-canvas.js"></script>
        <script src="js/shared/misc.js"></script>
        <script src="js/demo_1/dashboard.js"></script>
        <script src="sweetalert2.all.min.js"></script>
    </body>
</html>