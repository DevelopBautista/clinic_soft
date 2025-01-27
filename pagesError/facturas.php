<?php
include('../app/config.php');
include('../layout/sessiones.php');
include('../layout/superior.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-2 fw-medium mt-4">Oops! Pagina no encontradad</p>
            <p class="mt-4 mb-5">La página que estás buscando no existe o esta en construccion.</p>
            <a href="../index.php" class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
                Ir a Inicio.
            </a>
        </div>
    </div>
</div>


<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>

</aside>
<?php include('../layout/inferior.php'); ?>