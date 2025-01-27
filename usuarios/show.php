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
                    <h1 class="m-0">Datos del Personal</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--formulario-->
                            <form action="" method="post">

                                <!--f01-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="nombres"
                                            value="<?php echo $nombres; ?>" id="exampleInput" readonly>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" name="dir" value="<?php echo $dir; ?>"
                                            id="exampleInput" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="tel" value="<?php echo $tel; ?>"
                                            id="exampleInput" readonly>
                                    </div>
                                </div>
                                <!--f02-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="email"
                                            value="<?php echo $email; ?>" id="exampleInput" readonly>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" name="tip_sangre"
                                            value="<?php echo $tip_sangre; ?>" id="exampleInput" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="fech_ingreso"
                                            value="<?php echo $fech_ingreso; ?>" id="exampleInput" readonly>
                                    </div>
                                </div>
                                <!--f03-->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="pswd2"
                                        value="<?php echo $nombre_rol; ?>" id="exampleInput" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="ced"
                                        value="<?php echo $cedula;?>" id="exampleInput" readonly>
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group">
                                    <a href="listarUsuarios.php" class="btn btn-secondary">Volver a listado</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>