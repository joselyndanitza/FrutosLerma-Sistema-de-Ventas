<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a class="nav-link">
                <div class="profile-image">
                    <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?php echo $_SESSION['usuario']; ?></p>
                    <p class="designation">En Linea</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Menú</li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Principal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth4" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">Clientes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php"> Detalle Cliente </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregarcliente.php"> Nuevo Cliente </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">Personal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="personal.php"> Detalle Personal </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregarpersonal.php"> Nuevo Personal </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">Productos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Detalle Producto </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Nuevo Producto </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" data-toggle="collapse" href="#auth7" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Reportes Graficos</span>
            </a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link disabled" data-toggle="collapse" href="#auth12" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">Usuarios</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth12">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Detalle Empleado </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Registrar Empleado </a>
                    </li>
                </ul>
            </div>
        </li>-->
        <br>
        <button onclick="location.href='cerrar-sesion.php'" type="button" class="btn btn-primary btn-lg btn-fw">Cerrar Sesion</button>
    </ul>
</nav>