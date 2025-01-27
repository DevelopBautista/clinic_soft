<?php
include('../app/config.php');
include('../layout/sessiones.php');
include('../app/controllers/record/update.php');
include("../app/controllers/pacientes/update_Paciente.php");
include("../app/controllers/usuarios/update_Usuarios.php");
include('../layout/superior.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar Record</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
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
                            <form action="../app/controllers/record/updateRecord.php" method="post">
                                <div class="card-body">
                                    <!--fila_01-->
                                    <div class="row ">
                                        <div class="form-group col-md-2">
                                           <label for="">Codigo</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $codigo_rd; ?>" disabled>
                                                <input type="text" value="<?php echo $id_rd; ?>" name="id_record"
                                                hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Tension Arterial</label>
                                            <input type="text" class="form-control" name="ta"
                                                value="<?php echo $ta; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Frecuencia Cardiaca</label>
                                            <input type="text" class="form-control" name="fc"
                                                value="<?php echo $fc; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Temp_Corporal</label>
                                            <input type="text" class="form-control" name="tp"
                                                value="<?php echo $tp; ?>">
                                        </div>
                                    </div>
                                    <!--fila_02-->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label for="">Peso</label>
                                            <input type="number" class="form-control" name="peso"
                                                value="<?php echo $peso; ?>" >
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="">Perimetro Abdominal</label>
                                            <input type="number" class="form-control" name="pr_abdom"
                                                value="<?php echo $pr_abdom; ?>" >
                                        </div>

                                        <div class="form-group col-md-3">
                                        <label for="">Frecuecia Respiratoria </label>
                                            <input type="text" class="form-control" name="fr"
                                                value="<?php echo $fr; ?>" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Hist_Enf_Actual</label>
                                            <input type="text" class="form-control" name="h_enf_actu"
                                                value="<?php echo $h_enf_actu; ?>" >
                                        </div>
                                    </div>

                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Personal_patolog</label>
                                            <input type="text" class="form-control" name="ant_per_pat"
                                                value="<?php echo $ant_per_pat; ?>" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Famil_patolog</label>
                                            <input type="text" class="form-control" name="ant_fam_pat"
                                                value="<?php echo $ant_fam_pat; ?>" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Habit_Toxicos</label>
                                            <input type="text" class="form-control" name="habit_toxicos"
                                                value="<?php echo $habit_toxicos;?>" >
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Diagnostico</label>
                                            <input type="text" class="form-control" name="diag" 
                                            value="<?php echo $diag; ?>" >
                                        </div>
                                    </div>
                                    <!--fila_04-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Tratamiento</label>
                                            <input type="text" class="form-control" name="tram" 
                                            value="<?php echo $tram; ?>" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Quirurgico</label>
                                            <input type="text" class="form-control" name="ant_qui"
                                                value="<?php echo $ant_qui; ?>" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Alergicos</label>
                                            <input type="text" class="form-control" name="ant_alerg"
                                                value="<?php echo $ant_alerg; ?>" >
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">fecha_Ingreso</label>
                                            <input type="text" class="form-control" 
                                            value="<?php echo $fech_ingreso;?>" readonly >
                                        </div>
                                        
                                    </div>
                                    <!--f05-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Doctor</label>
                                            <input type="text" class="form-control" 
                                            value="<?php echo $nombres_tb ?>" readonly>
                                            <input type="text" value="<?php echo $id_usuario;?>" name="id_usuario" hidden>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Nombre_Paciente</label>
                                            <input type="text" class="form-control" 
                                                value="<?php echo $nombre_paciente; ?>" readonly>
                                                <input type="text" value="<?php echo $id; ?>" 
                                                name="id_paciente"hidden >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Tipo_Sangre</label>
                                            <input type="text" class="form-control" name="tip_sangre"  
                                            value="<?php echo $tipo_sangre; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Ultima visita</label>
                                            <input type="date" class="form-control" name="ult_visita" >
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listar.php" class="btn btn-secondary">Volver</a>
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