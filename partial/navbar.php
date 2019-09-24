<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php">
            <img src="images/logo_2.svg" alt="logo" /> 
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo2-mini.svg" alt="logo" /> 
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Sistema de Control de Ventas</li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php 
                ini_set('date.timezone','America/Bogota');
                $time1 = date('H:i:s', time());
                $time2 = date('Y-m-d', time());
                echo "<b>Hora del Servidor</b>: ".$time2." | ".date("g:i a",strtotime($time1));
            ?>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> 
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['usuario']; ?></p>
                        <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    <a class="dropdown-item" href="cerrar-sesion.php">Cerrar Sesiòn
                        <i class="dropdown-item-icon ti-power-off"></i>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>