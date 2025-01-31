<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic Soft</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo $url ?>/public/css/css.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- sweetalert2-->
    <script src="<?php echo $url; ?>/public/js/sweetalert.js"></script>
    <!-- FontAwesome-->
    <script src="<?php echo $url; ?>/public/js/fonticons.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--myResources-->
    <link rel="stylesheet" href="<?php echo $url ?>/public/css/pagina404.css">
    <!-- jQuery -->
    <script src="<?php echo $url ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!--FullCalendar-->
    <script src='<?php echo $url ?>/public/js/index.global.js'></script>
    <script src='<?php echo $url ?>/public/js/index.global.min.js'></script>
    <script src='<?php echo $url ?>/public/js/locales-all.global.min.js'></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"></a>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <i class="fa-solid fa-door-open"></i>
                    <a href="<?php echo $url; ?>/app/controllers/login/cerrar_seccion.php" class="btn ">Cerrar
                        Sesión
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!--Control de acceso-->
            <?php
            if ($id_rol == 1) { ?>
                <a href="<?php echo $url; ?>/index.php" class="brand-link">
                    <img loading="lazy" src="<?php echo $url ?>/public/img/logoTipo.png">
                    <span class="brand-text font-weight-light">Clinic Soft</span>
                </a>
                <?php
            }
            ?>
            <?php
            if ($id_rol == 2) { ?>
                <a href="<?php echo $url; ?>/asistente.php" class="brand-link">
                    <img loading="lazy" src="<?php echo $url ?>/public/img/logoTipo.png">
                    <span class="brand-text font-weight-light">Clinic Soft</span>
                </a>
                <?php
            }
            ?>
            <?php
            if ($id_rol == 3) { ?>
                <a href="<?php echo $url; ?>/doctor.php" class="brand-link">
                    <img loading="lazy" src="<?php echo $url ?>/public/img/logoTipo.png">
                    <span class="brand-text font-weight-light">Clinic Soft</span>
                </a>
                <?php
            }
            ?>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <h4 style="color:#c2c7d0;" class="d-block"><?php echo $nombres_tb ?></h4>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!--menu Admin-->
                        <?php
                        if ($id_rol == 1) {

                            ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-users"></i>
                                    <p>
                                        Pacientes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/pacientes/listarPacientes.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de pacientess</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/pacientes/nuevoPaciente.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo paciente</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/records/listar.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Record pacientes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>
                            <!--menu_Dr-->
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-user-doctor"></i>
                                    <p>
                                        Doctores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/doctores/listarDoctores.php" class="nav-link">
                                            <i class="far fa-circle text-yellow nav-icon"></i>
                                            <p>Listado de Doctores</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>
                            <!--Menu_Consultas-->
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    <p>
                                        Citas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/citas/cita.php" class="nav-link">
                                            <i class="far fa-circle text-green nav-icon"></i>
                                            <p>Citas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>
                            <!--menu_Personal-->
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-users-gear"></i>
                                    <p>
                                        Personal
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/usuarios/listarUsuarios.php" class="nav-link">
                                            <i class="far fa-circle text-red nav-icon"></i>
                                            <p>Listado del Personal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/usuarios/nuevoUsuario.php" class="nav-link">
                                            <i class="far fa-circle text-red nav-icon"></i>
                                            <p>Nuevo Personal</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>


                            <?php
                        }
                        ?>
                        <!--menu Asistente-->
                        <?php
                        if ($id_rol == 2) { ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-users"></i>
                                    <p>
                                        Pacientes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/pacientes/listarPacientes.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de pacientess</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/pacientes/nuevoPaciente.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo paciente</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    <p>
                                        Citas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/citas/cita.php" class="nav-link">
                                            <i class="far fa-circle text-green nav-icon"></i>
                                            <p>Citas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <br>
                            <?php
                        }
                        ?>
                        <!--menu Doctores-->
                        <?php
                        if ($id_rol == 3) { ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa-solid fa-users"></i>
                                    <p>
                                        Doctores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $url ?>/records/listar.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Record pacientes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>