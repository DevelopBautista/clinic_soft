<?php
include('../app/config.php');
include('../layout/sessiones.php');
include('../app/controllers/record/showDatas.php');
include('../layout/superior.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos del Record</h1>
                </div>
            </div>
        </div>
    </div>
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
                            <form action="" method="post">
                                <div class="card-body">
                                    <!--fila_01-->
                                    <div class="row ">
                                        <div class="form-group col-md-2">
                                           <label for="">Codigo</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $codigo_rd; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Tension Arterial</label>
                                            <input type="text" class="form-control" id="ta"
                                                value="<?php echo $ta; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Frecuencia Cardiaca</label>
                                            <input type="text" class="form-control" id="fc"
                                                value="<?php echo $fc; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Temp_Corporal</label>
                                            <input type="text" class="form-control" id="tp"
                                                value="<?php echo $tp; ?>" disabled>
                                        </div>
                                    </div>
                                    <!--fila_02-->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label for="">Peso</label>
                                            <input type="number" class="form-control" id="peso"
                                                value="<?php echo $peso; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="">Perimetro Abdominal</label>
                                            <input type="number" class="form-control" id="pr_abdom"
                                                value="<?php echo $pr_abdom; ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                        <label for="">Frecuecia Respiratoria </label>
                                            <input type="text" class="form-control" id="fr"
                                                value="<?php echo $fr; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Hist_Enf_Actual</label>
                                            <input type="text" class="form-control" id="h_enf_actu"
                                                value="<?php echo $h_enf_actu; ?>" disabled>
                                        </div>
                                    </div>

                                    <!--fila_03-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Personal_patolog</label>
                                            <input type="text" class="form-control" id="ant_per_pat"
                                                value="<?php echo $ant_per_pat; ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Famil_patolog</label>
                                            <input type="text" class="form-control" id="ant_fam_pat"
                                                value="<?php echo $ant_fam_pat; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Habit_Toxicos</label>
                                            <input type="text" class="form-control" id="habit_toxicos"
                                                value="<?php echo $habit_toxicos;?>" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Diagnostico</label>
                                            <input type="text" class="form-control" id="diag" 
                                            value="<?php echo $diag; ?>" disabled>
                                        </div>
                                    </div>
                                    <!--fila_04-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Tratamiento</label>
                                            <input type="text" class="form-control" id="tram" 
                                            value="<?php echo $tram; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Quirurgico</label>
                                            <input type="text" class="form-control" id="ant_qui"
                                                value="<?php echo $ant_qui; ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Ant_Alergicos</label>
                                            <input type="text" class="form-control" 
                                                value="<?php echo $ant_alerg; ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">fecha_Ingreso</label>
                                            <input type="text" class="form-control" 
                                            value="<?php echo $fech_ingreso;?>" disabled >
                                        </div>
                                    </div>
                                    <!--f05-->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Doctor</label>
                                            <input type="text" class="form-control" 
                                            value="<?php echo $nombres_tb ?>"
                                                disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Nombre_Paciente</label>
                                            <input type="text" class="form-control" placeholder="Paciente"
                                                value="<?php echo $nombre_paciente; ?>" readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Tipo_Sangre</label>
                                            <input type="text" class="form-control"  
                                            value="<?php echo $tipo_sangre; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Ultima Visita</label>
                                            <input type="text" class="form-control" 
                                            value="<?php echo $ultima_visita;?>" disabled >
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listar.php" class="btn btn-secondary">Volver</a>
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