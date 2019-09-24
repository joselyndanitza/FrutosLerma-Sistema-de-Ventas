<?php
    require 'funciones6.php';
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('location: login.php');
    }
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessge();
        die();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idCliente      = limpiarDatos($_POST['idCliente']);
        $Nombres        = limpiarDatos($_POST['Nombres']);
        $Tipo           = limpiarDatos($_POST['Tipo']);
        $Documento      = limpiarDatos($_POST['Documento']);
        $Direccion      = limpiarDatos($_POST['Direccion']);
        $Telefono       = limpiarDatos($_POST['Telefono']);
        $Email          = limpiarDatos($_POST['Email']);

        $statement = $conexion->prepare
        ("UPDATE clientes SET
         Nombres = :Nombres,
         Tipo = :Tipo,
         Documento = :Documento,
         Direccion = :Direccion,
         Telefono = :Telefono,
         Email = :Email
         WHERE idCliente =:idCliente");

        $statement ->execute(array(
            ':idCliente'    => $idCliente,
            ':Nombres'      => $Nombres,
            ':Tipo'         => $Tipo,
            ':Documento'    => $Documento,
            ':Direccion'    => $Direccion,
            ':Telefono'     => $Telefono,
            ':Email'        => $Email
        ));

        header('Location: clientes.php');

    }else{
        $idCliente = id_numeros($_GET['idCliente']);
        if(empty($idCliente)){
            header('Location: index.php');
        }
        $contacto = obtener_id($conexion,$idCliente);

        if(!$contacto){
            header('Location: index.php');
        }
        $contacto =$contacto[0];
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
                                    <h4 class="page-title">Menú > Clientes > Editar Cliente</h4>
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
                                                <h4 class="card-title">Editar Registro del Cliente</h4>
                                                <form class="form-sample" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                                    <input type="hidden" name="idCliente" value="<?php echo $contacto['idCliente'];?>" > 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Tipo de Cliente:</label>
                                                                <div class="col-sm-4">
                                                                <?php if($contacto[2] == "Persona Natural" ){ ?>
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="Tipo" value="Persona Natural" checked=""> Persona Natural <i class="input-helper"></i></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="Tipo" value="Persona Juridica"> Persona Juridica <i class="input-helper"></i></label>
                                                                    </div>
                                                                </div> 
                                                                <div class="col-sm-4">
                                                                <?php } elseif( $contacto[2] == "Persona Juridica" ){ ?>
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="Tipo" value="Persona Natural" > Persona Natural <i class="input-helper"></i></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="Tipo" value="Persona Juridica" checked=""> Persona Juridica <i class="input-helper"></i></label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">DNI / RUC:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" value="<?php echo $contacto[3]; ?>" name="Documento" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Nombres:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" value="<?php echo $contacto[1]; ?>" name="Nombres" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Direcciòn:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" value="<?php echo $contacto[4]; ?>" name="Direccion" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Telefono:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" value="<?php echo $contacto[5]; ?>"  name="Telefono" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Email:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" value="<?php echo $contacto[6]; ?>" name="Email" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col text-center">
                                                        <button type="submit" id="btn1" class="btn btn-primary btn-lg mr-2">Actualizar</button>
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