<nav class="navbar fixed-top navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../vistas/empleado/index.php">
            <img src="../../src/images/empresa.png" width="70" height="70" alt="Logo" class="navbar-logo"> "INGESOFT S.A"
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-lines-fill me-2"></i>EMPLEADOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../vistas/empleado/index.php"><i class="bi bi-plus-circle me-2"></i>INGRESO DE EMPLEADOS</a></li>
                        <li><a class="dropdown-item" href="../../vistas/empleado/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-card-list me-2"></i>PUESTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../vistas/puesto/index.php"><i class="bi bi-plus-circle me-2"></i>INGRESO DE PUESTOS</a></li>
                        <li><a class="dropdown-item" href="../../vistas/puesto/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-diagram-3-fill me-2"></i>AREAS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../vistas/areas/index.php"><i class="bi bi-plus-circle me-2"></i>INGRESO DE AREAS</a></li>
                        <li><a class="dropdown-item" href="../../vistas/areas/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people-fill me-2"></i>ASIGNACIONES
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../vistas/asignacion/index.php"><i class="bi bi-person-plus-fill me-2"></i>ASIGNAR PUESTO A EMPLEADO</a></li>
                        <li><a class="dropdown-item" href="../../vistas/asignacionarea/index.php"><i class="bi bi-person-plus-fill me-2"></i>ASIGNAR AREA A EMPLEADO</a></li>
                        <li><a class="dropdown-item" href="../../controladores/organizacion/buscar.php"><i class="bi bi-person-plus-fill me-2"></i>ORGANIZACION</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
