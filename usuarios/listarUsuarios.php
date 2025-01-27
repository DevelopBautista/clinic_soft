<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/usuarios/listarController.php");
include('../layout/superior.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado del Personal</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header ">
                            <h3 class="card-title">Personal Registrados</h3>

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
                                                    <center>Nombre Completo</center>
                                                </th>
                                                <th>
                                                    <center>Cedula</center>
                                                </th>
                                                <th>
                                                    <center>Email</center>
                                                </th>
                                                <th>
                                                    <center>Rol</center>
                                                </th>
                                                <th>
                                                    <center>Acciones</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $contador = 0;
                                            foreach ($usuarios_datos as $datos) {

                                                $id_usuario = $datos['id_usuario']; ?>

                                                <tr>
                                                    <td><?php echo $contador += 1; ?></td>
                                                    <td><?php echo $datos['nombres']; ?></td>
                                                    <td><?php echo $datos['cedula']; ?></td>
                                                    <td><?php echo $datos['email']; ?></td>
                                                    <td><?php echo $datos['nombre_rol']; ?></td>

                                                    <td>
                                                        <center>
                                                            <div class="btn-group">
                                                                <a href="show.php?id=<?php echo $id_usuario; ?>"
                                                                    class="btn btn-info btn-sm"><i
                                                                        class='fas fa-eye'></i>Ver</a>
                                                                <a href="update.php?id=<?php echo $id_usuario; ?>"
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Personal",
                "infoEmpty": "Mostrando 0 to 0 of 0 Personal",
                "infoFiltered": "(Filtrado de MAX total Personal)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Personal",
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