<?php
require 'funciones.php';
session_start();
if(!isset($_SESSION["usuario"])){
    header('location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Nombres        = limpiarDatos($_POST['Nombres']);
    $Apellidos      = limpiarDatos($_POST['Apellidos']);
    $Dni            = limpiarDatos($_POST['Dni']);
    $Cargo          = limpiarDatos($_POST['Cargo']);
    $Direccion      = limpiarDatos($_POST['Direccion']);
    $Celular        = limpiarDatos($_POST['Celular']);
    $Email          = limpiarDatos($_POST['Email']);
    
    $mensaje='';
    if(empty($Nombres) or empty($Apellidos) or empty($Dni) or empty($Cargo) or empty($Direccion) or empty($Celular) or empty($Email)){
        $mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
    }
    else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            die();
        }
    }
    if($mensaje==''){
        $statement = $conexion->prepare(
        'INSERT INTO Personal values(null, :Nombres, :Apellidos, :Dni, :Cargo, :Direccion, :Celular, :Email)');

        $statement ->execute(array(
        ':Nombres'      =>$Nombres,
        ':Apellidos'    =>$Apellidos,
        ':Dni'          =>$Dni,
        ':Cargo'        =>$Cargo,
        ':Direccion'    =>$Direccion,
        ':Celular'      =>$Celular,
        ':Email'        =>$Email
        ));
        //header('Location: cliente.php');
        $message = "Personal Registrado";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
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
                                    <h4 class="page-title">Menú > Personal > Nuevo Personal</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page Title Header Ends-->
                        <!-- <div class="main-panel">-->
                        <div class="col-12">
                            <div class="content-wrapper">
                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Registro de Personal</h4>
                                                <form class="form-sample" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Nombres:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Nombres" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Apellidos:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Apellidos" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">DNI:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Dni" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Cargo:</label>
                                                                <div class="col-sm-9">
                                                                    <select name="Cargo" class="form-control form-control-lg">
                                                                        <option selected="true" disabled="disabled">Seleccione la opción</option>
                                                                        <option value="Administrador">Administrador</option>
                                                                        <option value="Jefe de Venta">Jefe de Venta</option>
                                                                        <option value="Vendedor">Vendedor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Direcciòn:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Direccion" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Celular:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Celular" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Email:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="Email" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col text-center">
                                                        <button type="submit" id="btn1" class="btn btn-primary btn-lg mr-2">Registrar</button>
                                                    </div>
                                                </form>
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
            </div>
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