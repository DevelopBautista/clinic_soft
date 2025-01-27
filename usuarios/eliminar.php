<?php
include('../app/config.php');
include('../layout/sessiones.php');
include('../layout/superior.php');
include('../app/controllers/usuarios/showDataUser.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Eliminar datos del  Usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Seguro que desea Eliminar a <?php echo $nombres?> ?</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!--formulario-->
                            <form action="../app/controllers/usuarios/deleteUsuarioController.php" method="post">
                                <input type="text" name="id" value="<?php echo $id_usuario_get;?>" hidden>
                            <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                            value="<?php echo $nombres; ?>" readonly>
                                    </div>
                                    <div class="form-group">

                                        <input type="email" class="form-control" 
                                            value="<?php echo $email; ?>" readonly>
                                    </div>
                                    <div class="form-group " >

                                        <input type="text" class="form-control" 
                                            value="<?php echo $rol; ?>" readonly>
                                    </div>
                                    <div class="form-group">

                                        <input type="text" class="form-control" 
                                            value="<?php echo $fech_ingreso; ?>" readonly>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listarUsuarios.php" class="btn btn-secondary">Volver</a>
                                    
                                    <button class="btn btn-danger">Eliminar</button>


                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>