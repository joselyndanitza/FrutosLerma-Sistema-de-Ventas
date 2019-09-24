<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('location: login.php');
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
                        <h4 class="page-title">Menú > Principal</h4>
                    </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex">
                                        <div class="wrapper">
                                            <h3 class="mb-0 font-weight-semibold">
                                                <?php 
                                                    try{
                                                        $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
                                                    }catch(PDOException $e){
                                                        echo "Error: ". $e->getMessage();
                                                        die();
                                                    }
                                                
                                                    $statement = $conexion->prepare('SELECT COUNT(*) FROM clientes');
                                                    
                                                    $statement ->execute();
                                                
                                                    $num=$statement->rowCount();
                                                    if($num > 0)
                                                    {
                                                        //$row = $statement->fetch_assoc();
                                                        $row = $statement->fetchAll();
                                                        echo $row[0]['COUNT(*)'];
                                                        //header("location:index.php");
                                                    }
                                                    else
                                                    {
                                                        // header("location:login.php");
                                                    }
                                                ?>
                                            </h3>
                                            <h5 class="mb-0 font-weight-medium text-primary">Clientes</h5>
                                        </div>
                                        <div class="wrapper my-auto ml-auto ml-lg-4">
                                            <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                        </div>
                                    </div>
                                </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">0</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Productos</h5>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">
                                <?php 
                                    try{
                                        $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
                                    }catch(PDOException $e){
                                        echo "Error: ". $e->getMessage();
                                        die();
                                    }
                                
                                    $statement = $conexion->prepare('SELECT COUNT(*) FROM personal');
                                    
                                    $statement ->execute();
                                
                                    $num=$statement->rowCount();
                                    if($num > 0)
                                    {
                                        //$row = $statement->fetch_assoc();
                                        $row = $statement->fetchAll();
                                        echo $row[0]['COUNT(*)'];
                                        //header("location:index.php");
                                    }
                                    else
                                    {
                                        // header("location:login.php");
                                    }
                                ?>
                            </h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Personal</h5>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">0</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Ventas</h5>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12 grid-margin">
                  </div>
                  <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Ultimas Ventas</h4>
                        </div>
                        <p>Reportes de las ultimas ventas realizadas en la empresa</p>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>ID Venta</th>
                                <th>ID Cliente</th>
                                <th>Empleado</th>
                                <th>Fecha</th>
                                <th>Importe</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
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
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- JS Requeridos -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <script src="js/shared/off-canvas.js"></script>
    <script src="js/shared/misc.js"></script>
    <script src="js/demo_1/dashboard.js"></script>
    </body>
</html>