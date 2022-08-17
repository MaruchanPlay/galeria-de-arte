<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <?php
      if ($_SESSION['tipo'] == "administrador" ) {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="../view_usuario/index.php">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Usuario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view_artista/index.php">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Artista
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view_obras/index.php">
                    <span data-feather="briefcase" class="align-text-bottom"></span>
                    Obra
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view_artista/index.php">
                    <span data-feather="target" class="align-text-bottom"></span>
                    Administrador
                </a>
            </li> 
            <?php
        }  else if ($_SESSION['tipo'] == "artista" ) {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="../view_artista/index.php">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Artista
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view_obras/index.php">
                    <span data-feather="briefcase" class="align-text-bottom"></span>
                    Obra
                </a>
            </li>

            <?php
        }  else if ($_SESSION['tipo'] == "usuario" ) 
        ?>
            <li class="nav-item">
                <a class="nav-link" href="../view_usuario/index.php">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Usuario
                </a>
             </li>
        </ul>
    </div>
</nav>