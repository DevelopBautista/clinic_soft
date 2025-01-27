<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/pacientes/listarController.php");
include("../app/controllers/pacientes/listarPacientes.php");
include('../layout/superior.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nuevo Paciente</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Paciente</h3>
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
                            <form action="../app/controllers/pacientes/nuevoPacienteController.php" method="post">
                                <div class="card-body">
                                    <!--fila_01-->
                                    <div class="row ">
                                        <div class="form-group col-md-3">
                                            <?php
                                            function ceros($numero)
                                            {
                                                $len = 0;
                                                $cantidCero = 5;
                                                $aux = $numero;
                                                $pos = strlen($numero);
                                                $len = $cantidCero - $pos;
                                                for ($i = 0; $i < $len; $i++) {
                                                    $aux = "0" . $aux;
                                                }
                                                return $aux;

                                            }
                                            $contadorId = 1;
                                            foreach ($pacientes_datos as $datos) {
                                                $contadorId = $contadorId + 1;
                                            }
                                            ?>
                                            <!--solo para ver el codigo-->
                                            <input type="text" class="form-control"
                                                value="<?php echo 'P-' . ceros($contadorId); ?>" disabled>

                                            <input type="text" name="codigo"
                                                value="<?php echo 'P-' . ceros($contadorId); ?>" hidden>
                                        </div>
                                        <div class="form-group col-md-7">
                                            <input type="text" class="form-control" name="nombres"
                                                placeholder="Nombre Completo" required>
                                        </div>
                                    </div>

                                    <!--fila_02-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="sexo" placeholder="Sexo"
                                                required>
                                        </div>
                                        <div class="form-group col-md-3">

                                            <input type="number" class="form-control" name="edad" placeholder="Edad"
                                                required>
                                        </div>

                                        <div class="form-group col-md-4">

                                            <input type="text" class="form-control" name="ced" placeholder="Cedula"
                                                required>
                                        </div>
                                    </div>

                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-5">

                                            <input type="text" class="form-control" name="segM"
                                                placeholder="Seguro Medico" required>
                                        </div>

                                        <div class="form-group col-md-5">

                                            <input type="text" class="form-control" name="tel" placeholder="Telefono"
                                                required>
                                        </div>
                                    </div>
                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" name="dire" placeholder="Direccion"
                                                required>
                                        </div>
                                    </div>

                                    <!--fila_04-->
                                    <div class="row">
                                        <div class="form-group col-md-6">

                                            <input type="text" class="form-control" name="email" placeholder="E-Mail">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <input type="date" class="form-control" name="fech_ingreso" equired>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listarPacientes.php" class="btn btn-secondary">Cancelar</a>
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



<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>