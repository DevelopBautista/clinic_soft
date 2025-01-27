<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/pacientes/update_Paciente.php");
include('../layout/superior.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar Datos del paciente</h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">información del Paciente</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <!--formulario-->
                            <form action="../app/controllers/pacientes/updateControllerPaciente.php" method="post">
                                <div class="card-body">
                                    <!--fila_01-->
                                    <div class="row ">
                                        <div class="form-group col-md-3">
                                            <input type="text" name="id" value="<?php echo $id;?>" hidden>
                                            <!--solo para ver el codigo-->
                                            <label for="">Codigo</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $codigo;?>" readonly>
                                        </div>
                                        <div class="form-group col-md-7">
                                        <label for="">Nombre y Apellido</label>
                                            <input type="text" class="form-control" name="nombres"
                                                    value="<?php echo $nombres_paciente;?>" id="exampleInput" readonly>
                                        </div>
                                    </div>

                                    <!--fila_02-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                        <label for="">Sexo</label>
                                            <input type="text" class="form-control" name="sexo" 
                                            value="<?php echo $sexo;?>" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="">Edad</label>
                                            <input type="number" class="form-control" name="edad" value="<?php echo $edad;?>">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Cedula</label>
                                            <input type="text" class="form-control" name="ced" value="<?php echo $cedula?>" >
                                        </div>
                                    </div>

                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label for="">Seguro Medico</label>
                                            <input type="text" class="form-control" name="segM"
                                               value="<?php echo $seg_medico;?>">
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="">Telefono</label>
                                            <input type="text" class="form-control" name="tel" value="<?php echo $tel;?>">
                                        </div>
                                    </div>
                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <label for="">Direccion</label>
                                            <input type="text" class="form-control" name="dire" value="<?php echo $dire;?>">
                                        </div>
                                    </div>

                                    <!--fila_04-->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">E-Mail</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Fecha de Ingreso</label>
                                            <input type="text" class="form-control" name="fech_ingreso" value="<?php echo $fech_ingreso;?>" readonly>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listarPacientes.php" class="btn btn-secondary">Volver</a>
                                    <button type="submit" class="btn btn-success"
                                        name="btnActualizar">Actualizar</button>
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