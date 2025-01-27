<?php
include('../app/config.php');
include('../layout/sessiones.php');
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
                    <h1 class="m-0">Listado de Pacientes</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-13">
                    <div class="card card-info">
                        <div class="card-header ">
                            <h3 class="card-title">Pacientes</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="thead-dark table-sm">
                                            <tr>

                                                <th>
                                                    <center>#</center>
                                                </th>
                                                <th>
                                                    <center>Cod</center>
                                                </th>
                                                <th>
                                                    <center>NombreCompleto</center>
                                                </th>
                                                <th>
                                                    <center>Cedula</center>
                                                </th>
                                                <th>
                                                    <center>SeguroMedico</center>
                                                </th>
                                                <th>
                                                    <center>Telefono</center>
                                                </th>

                                                <th>
                                                    <center>FechaIngreso</center>
                                                </th>

                                                <th>
                                                    <center>Acciones</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $contador = 0;
                                            foreach ($pacientes_datos as $datos) {

                                                $id_paciente = $datos['id_paciente']; ?>

                                                <tr>
                                                    <td><?php echo $contador += 1; ?></td>
                                                    <td><?php echo $datos['codigo']; ?></td>
                                                    <td><?php echo $datos['nombres_paciente']; ?></td>
                                                    <td><?php echo $datos['cedula']; ?></td>
                                                    <td><?php echo $datos['seguro_medico']; ?></td>
                                                    <td><?php echo $datos['tel']; ?></td>
                                                    <td><?php echo $datos['fecha_ingreso']; ?></td>
                                                    <td>
                                                        <center>
                                                            <div class="btn-group">
                                                                <a href="show.php?id=<?php echo $id_paciente; ?>"
                                                                    class="btn btn-info btn-sm"><i
                                                                        class='fas fa-eye'></i>Ver</a>
                                                                <a href="update.php?id=<?php echo $id_paciente; ?>"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class='fas fa-pencil-alt'></i>Editar</a>
                                                            </div>
                                                        </center>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="card-header">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                            </div>
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

<!-- Page specific script -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>

<script>
    $(function () {
        $("#example1").DataTable({
            /* cambio de idiomas de datatable */
            "pageLength": 5,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Pacientes",
                "infoFiltered": "(Filtrado de MAX total Pacientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Pacientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            /* fin de idiomas */
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
            {
                extend: 'colvis',
                text: 'Visol de columnas'
            }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>