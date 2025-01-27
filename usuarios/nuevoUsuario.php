<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/roles/listarRoles.php");
include('../layout/superior.php');

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nuevo Personal</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuario</h3>

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
                            <form action="../app/controllers/usuarios/nuevoUsuarioController.php" method="post">
                                <!--f01-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="nombres"
                                            placeholder="Nombre Completo" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" name="dir" placeholder="Direccion"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="tel" placeholder="Telefono"
                                            required>
                                    </div>
                                </div>
                                <!--f02-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="email" placeholder="E-Mail"
                                            required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" name="tip_sangre"
                                            placeholder="Tipo de Sangre" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="date" class="form-control" name="fech_ingreso" required>
                                    </div>
                                </div>
                                <!--f03-->
                                <div class="row">
                                    <div class="form-group col-md-4">

                                        <select name="rol" id="select" class="form-control">
                                            <option>Seleccionar Rol </option>
                                            <?php foreach ($roles_datos as $datos) { ?>
                                                <option value="<?php echo $datos['id_rol']; ?>">
                                                    <?php echo $datos['nombre_rol']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="password" class="form-control" name="pswd" placeholder="Contraseña"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="password" class="form-control" name="pswd2"
                                            placeholder="Repetir Contraseña" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="ced" placeholder="Cedula"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4 espec">
                                        <input type="texy" class="form-control" name="espec" placeholder="Especialidad">
                                    </div>
                                </div>

                                <script>//script para show and hide el div especiliada
                                    $('.espec').hide();
                                    $("#select").on('change', function () {
                                        var selectValor = $(this).val();
                                        if (selectValor==3) {
                                            $('.espec').show();
                                        }else{
                                            $('.espec').hide();
                                        }
                                    });
                                </script>

                                <div class="form-group">
                                    <a href="listarUsuarios.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" name="btnRegistrar">Registrar</button>
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


<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>

</aside>
<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>