<?php 
require 'funciones.php';
session_start();
if(isset($_SESSION["usuario"])){
    header('location: index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario            = limpiarDatos($_POST['usuario']);
    $clave              = limpiarDatos($_POST['clave']);
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
        die();
    }

    $statement = $conexion->prepare(
        'SELECT * FROM Usuarios WHERE usuario = :usuario AND clave = :clave');
    
        $statement ->execute(array(
        ':usuario'     =>$usuario,
        ':clave'       =>$clave
        ));

        $num=$statement->rowCount();
            if($num > 0)
            {
             //$row = $statement->fetch_assoc();
                $row = $statement->fetchAll();
                $_SESSION["usuario"]    = $row[0]['usuario'];
                $_SESSION["clave"]      = $row[0]['clave'];
                $_SESSION["email"]      = $row[0]['email'];
               
                echo $_SESSION['usuario'];
                echo $_SESSION['clave'];
                header("location:index.php");
            }
            else
            {
                header("location:login.php");
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
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                    <img src="images/logo_2.svg" style="padding-bottom: 30px;" alt="">
                                    <div class="form-group">
                                        <label class="label">Usuario</label>
                                        <div class="input-group">
                                            <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                <!--<i class="mdi mdi-check-circle-outline"></i>-->
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="clave" class="form-control" placeholder="*********">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                <!--<i class="mdi mdi-check-circle-outline"></i>-->
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary submit-btn btn-block">Iniciar Sesion</button>
                                    </div>
                                </form>
                            </div>
                            <ul class="auth-footer"></ul>
                            <p class="footer-text text-center">© 2019 Frutos Lerma. Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS Requeridos -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <script src="js/shared/off-canvas.js"></script>
        <script src="js/shared/misc.js"></script>
    </body>
</html>