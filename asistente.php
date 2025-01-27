<?php
include('app/config.php');
include('layout/sessiones.php');
include("app/controllers/usuarios/listarController.php");
include("app/controllers/doctores/listarDoctores.php");
include("app/controllers/record/listarRd.php");
include("app/controllers/pacientes/listarPacientes.php");
include("app/controllers/citas/listaCitas.php");

include('layout/superior.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido :<?php echo $nombres_tb; ?></h1>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!--card user-->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_us = 0;
                            foreach ($usuarios_datos as $usuarios_dato) {
                                $contador_us += 1;
                            }
                            ?>
                            <h3><?php echo $contador_us; ?></h3>
                            <p>Personal Registrados</p>
                        </div>
                        <a href="#">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="#" class="small-box-footer">Mas info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!--card doctores-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_dr = 0;
                            foreach ($doctores_datos as $dr_dato) {
                                $contador_dr += 1;
                            }
                            ?>
                            <h3><?php echo $contador_dr; ?></h3>
                            <p>Doctores Registrados</p>
                        </div>
                        <a href="#">
                            <div class="icon">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                        </a>
                        <a href="#" class="small-box-footer">Mas info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!--card records-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_rd = 0;
                            foreach ($signo_datos as $rd_dato) {
                                $contador_rd += 1;
                            }
                            ?>
                            <h3><?php echo $contador_rd; ?></h3>
                            <p>Records Registrados</p>
                        </div>
                        <a href="#">
                            <div class="icon">
                                <i class="fa-solid fa-list"></i>
                            </div>
                        </a>
                        <a href="#" class="small-box-footer">Mas info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!--card citas-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $contador_cita = 0;
                            foreach ($citas as $prod_dato) {
                                $contador_cita += 1;
                            }
                            ?>
                            <h3><?php echo $contador_cita; ?></h3>
                            <p>Citas Reservadas</p>
                        </div>
                        <a href="<?php echo $url; ?>/citas/cita.php">
                            <div class="icon">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                        </a>
                        <a href="<?php echo $url; ?>/citas/cita.php" class="small-box-footer">Mas info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!--card pacientes-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_paciente = 0;
                            foreach ($pacientes_datos as $paciente_dato) {
                                $contador_paciente += 1;
                            }
                            ?>
                            <h3><?php echo $contador_paciente; ?></h3>
                            <p>Pacientes Registrados</p>
                        </div>
                        <a href="<?php echo $url?>/pacientes/nuevoPaciente.php">
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </a>
                        <a href="<?php echo $url; ?>/pacientes/listarPacientes.php" class="small-box-footer">Mas info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.content -->
</div>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<?php include('layout/inferior.php'); ?>