<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/record/listarRd.php");
include("../app/controllers/pacientes/listarPacientes.php");
include("../app/controllers/usuarios/listarUsuarios.php");
include("../app/controllers/pacientes/update_Paciente.php");
include('../layout/superior.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-19">
                    <h1 class="m-0">Registro de Records
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#modal-nuevo">
                            <i class="fa fa-plus"></i>Agregar Nuevo
                        </button>
                    </h1>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-19">
                        <div class="card card-info">
                            <div class="card-header ">
                                <h3 class="card-title"></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead class="thead-dark table-sm">
                                        <tr>

                                            <th>
                                                <center>#</center>
                                            </th>
                                            <th>
                                                <center>Codig_Record</center>
                                            </th>

                                            <th>
                                                <center>Paciente</center>
                                            </th>
                                            <th>
                                                <center>Cedula</center>
                                            </th>

                                            <th>
                                                <center>Doctor</center>
                                            </th>

                                            <th>
                                                <center>Fecha de Ingreso</center>
                                            </th>
                                            <th>
                                                <center>Ultima Visita</center>
                                            </th>
                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($signo_datos as $datos) {
                                            $id_record = $datos['id_record'];
                                            ?>
                                            <tr>
                                                <td><?php echo $contador += 1; ?></td>
                                                <td><?php echo $datos['codigo_rd']; ?></td>
                                                <td><?php echo $datos['nombres_paciente']; ?></td>
                                                <td><?php echo $datos['cedula']; ?></td>
                                                <td><?php echo $datos['nombres']; ?></td>
                                                <td><?php echo $datos['fech_ingreso']; ?></td>
                                                <td><?php echo $datos['ultima_visita']; ?></td>
                                                <td>
                                                    <center>
                                                        <div class="btn-group">
                                                            <a href="show.php?id=<?php echo $id_record; ?>"
                                                                class="btn btn-info btn-sm"><i
                                                                    class='fas fa-eye'></i>Ver</a>
                                                            <a href="update.php?id=<?php echo $id_record; ?>"
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


                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>


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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Records",
                "infoEmpty": "Mostrando 0 to 0 of 0 Records",
                "infoFiltered": "(Filtrado de MAX total Records)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Records",
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

<!--Modal_record-->
<div class="modal fade" id="modal-nuevo">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;color:white">
                <h4 class="modal-title">Nuevo Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <form id="frm">
                        <!--fila_01-->
                        <div class="row ">
                            <div class="form-group col-md-2">
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
                                foreach ($signo_datos as $datos) {
                                    $contadorId = $contadorId + 1;
                                }
                                ?>
                                <!--solo para ver el codigo-->
                                <input type="text" class="form-control" value="<?php echo 'R-' . ceros($contadorId); ?>"
                                    disabled>

                                <input type="text" id="codigo" value="<?php echo 'R-' . ceros($contadorId); ?>" hidden>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="ta" placeholder="Tensión Arterial">
                                <label for="" id="lbta"></label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="fc" placeholder="Frecuencia Cardiaca">
                                <label for="" id="lbfc"></label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="tp" placeholder="Temperatura Corporal">
                                <label for="" id="lbtc"></label>
                            </div>
                        </div>
                        <!--fila_02-->
                        <div class="row">
                            <div class="form-group col-md-2">
                                <input type="number" class="form-control" id="peso" placeholder="Peso Corporal">
                                <label for="" id="lbpeso"></label>
                            </div>
                            <div class="form-group col-md-3">

                                <input type="number" class="form-control" id="pr_abdom"
                                    placeholder="Perimetro Abdominal">
                                <label for="" id="lbpa"></label>
                            </div>

                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="fr" placeholder="Frecuencia Respiratoria">
                                <label for="" id="lbfr"></label>
                            </div>
                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="h_enf_actu"
                                    placeholder="H.Enfermeda-actual">
                                <label for="" id="lbhea"></label>
                            </div>
                        </div>

                        <!--fila_03-->
                        <div class="row">
                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="ant_per_pat"
                                    placeholder="A-Personales Patologicos">
                                <label for="" id="lbaperpat"></label>
                            </div>

                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="ant_fam_pat"
                                    placeholder="A-Familiares Patologicos">
                                <label for="" id="lbafpat"></label>
                            </div>
                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="habit_toxicos"
                                    placeholder="Habitos Toxicos">
                                <label for="" id="lbht"></label>
                            </div>
                            <div class="form-group col-md-2">

                                <input type="text" class="form-control" id="diag" placeholder="Diagnostico">
                                <label for="" id="lbdiag"></label>
                            </div>
                        </div>
                        <!--fila_04-->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="tram" placeholder="Tratamiento">
                                <label for="" id="lbtram"></label>
                            </div>
                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="ant_qui" placeholder="Ant-Quirurgico">
                                <label for="" id="lbaq"></label>
                            </div>

                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" id="ant_alerg" placeholder="Ant-Alergico">
                                <label for="" id="lbanta"></label>
                            </div>

                            <div class="form-group col-md-2">
                                <input type="date" class="form-control" id="fech_ingreso">
                                <label for="" id="lbfecha"></label>
                            </div>
                        </div>
                        <!--f05-->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" value="<?php echo $nombres_tb ?>" readonly>
                                <input type="text" class="form-control" id="dr" value="<?php echo $id_usuario; ?>"
                                    hidden>
                            </div>
                            <div class="form-group col-md-2">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-buscar_pacientes">
                                    <i class="fa fa-search"></i> Buscar Paciente
                                </button>
                            </div>

                            <div class="form-group col-md-3">

                                <input type="text" class="form-control" value="<?php echo $nombres_paciente; ?>"
                                    id="nombre_paciente" readonly placeholder="Nombre del paciente">
                                <input type="text" id="id_paciente" value="<?php echo $id_paciente; ?>" hidden>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="tipo_sangre" placeholder="Tipo de sangre">
                                <label for="" id="lbts"></label>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                            <button type="button" class="btn btn-primary" id="btnRegistrar">Registrar</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


<!--modal ver pacientes-->
<div class="modal fade" id="modal-buscar_pacientes">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;color:white">
                <h4 class="modal-title">Pacientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="thead-dark table-sm">
                        <tr>

                            <th>
                                <center>#</center>
                            </th>
                            <th>
                                <center>Codigo</center>
                            </th>
                            <th>
                                <center>Nombre</center>
                            </th>
                            <th>
                                <center>Cedula</center>
                            </th>
                            <th>
                                <center>Seleccionar</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        foreach ($pacientes_datos as $datos) {
                            $id_paciente = $datos['id_paciente'];
                            $nom_paciente = $datos['nombres_paciente'];

                            ?>
                            <tr>
                                <td><?php echo $contador += 1; ?></td>
                                <td><?php echo $datos['codigo']; ?></td>
                                <td><?php echo $datos['nombres_paciente']; ?></td>
                                <td><?php echo $datos['cedula']; ?></td>
                                <center>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                            id="btn_seleccionar_pac<?php echo $id_paciente; ?>">Seleccionar</button>
                                        <!--code para seleccionar-->
                                        <script>
                                            $('#btn_seleccionar_pac<?php echo $id_paciente; ?>').click(
                                                function () {
                                                    var id_paciente = "<?php echo $id_paciente; ?>";
                                                    var nombres_paciente = "<?php echo $nom_paciente ?>";
                                                    $('#nombre_paciente').val(nombres_paciente);
                                                    $('#id_paciente').val(id_paciente);

                                                    $('#modal-buscar_pacientes').modal('toggle');//para destruir el modal
                                                }

                                            );

                                        </script>
                                    </td>
                                </center>

                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div id="respuesta"> </div>
<script>
    $(function () {

        $("#example2").DataTable({
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>

<!--script para guardar info en la tb-->
<script>
    $('#btnRegistrar').click(function () {
        var base = "<?php echo $url; ?>";
        var codigo = $('#codigo').val();
        var ta = $('#ta').val();
        var fc = $('#fc').val();
        var tp = $('#tp').val();
        var peso = $('#peso').val();
        var pr_abdom = $('#pr_abdom').val();
        var fr = $('#fr').val();
        var h_enf_actu = $('#h_enf_actu').val();
        var ant_per_pat = $('#ant_per_pat').val();
        var ant_fam_pat = $('#ant_fam_pat').val();
        var habit_toxicos = $('#habit_toxicos').val();
        var diag = $('#diag').val();
        var tram = $('#tram').val();
        var ant_qui = $('#ant_qui').val();
        var ant_alerg = $('#ant_alerg').val();
        var tipo_sangre = $('#tipo_sangre').val();
        var fech_ingreso = $('#fech_ingreso').val();
        var id_paciente = $('#id_paciente').val();
        var dr = $('#dr').val();
        var url = base + '/app/controllers/record/nuevo.php';

        if (ta == "") {
            setTimeout(function () {
                $("#lbta").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#ta").focus();
            return false;

        } else if (fc == "") {
            setTimeout(function () {
                $("#lbfc").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#fc").focus();
            return false;
        } else if (tp == "") {
            setTimeout(function () {
                $("#lbtc").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#tp").focus();
            return false;
        } else if (peso == "") {
            setTimeout(function () {
                $("#lbpeso").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#peso").focus();
            return false;
        } else if (pr_abdom == "") {
            setTimeout(function () {
                $("#lbpa").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#pr_abdom").focus();
            return false;
        } else if (fr == "") {
            setTimeout(function () {
                $("#lbfr").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#fr").focus();
            return false;
        } else if (h_enf_actu == "") {
            setTimeout(function () {
                $("#lbhea").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#h_enf_actu").focus();
            return false;
        } else if (ant_per_pat == "") {
            setTimeout(function () {
                $("#lbaperpat").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#ant_per_pat").focus();
            return false;
        } else if (ant_fam_pat == "") {
            setTimeout(function () {
                $("#lbafpat").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#ant_fam_pat").focus();
            return false;
        } else if (habit_toxicos == "") {
            setTimeout(function () {
                $("#lbht").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#habit_toxicos").focus();
            return false;
        } else if (diag == "") {
            setTimeout(function () {
                $("#lbdiag").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#diag").focus();
            return false;
        } else if (tram == "") {
            setTimeout(function () {
                $("#lbtram").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#tram").focus();
            return false;
        } else if (ant_qui == "") {
            setTimeout(function () {
                $("#lbaq").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#ant_qui").focus();
            return false;
        } else if (ant_alerg == "") {
            setTimeout(function () {
                $("#lbanta").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#ant_alerg").focus();
            return false;
        } else if (fech_ingreso == "") {
            setTimeout(function () {
                $("#lbfecha").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#fech_ingreso").focus();
            return false;
        } else if (tipo_sangre == "") {
            setTimeout(function () {
                $("#lbts").html("<span style='color:#fe5959';>Este campo es requerido.</span>").fadeOut(5000);
            }, 300);
            $("#tipo_sangre").focus();
            return false;
        } else {
            $.post(url, {
                codigo: codigo, ta: ta, fc: fc,
                tp: tp, peso: peso, pr_abdom: pr_abdom,
                fr: fr, h_enf_actu: h_enf_actu,
                ant_per_pat: ant_per_pat,
                ant_fam_pat: ant_fam_pat, habit_toxicos: habit_toxicos,
                diag: diag, tram: tram, ant_qui: ant_qui,
                ant_alerg: ant_alerg, tipo_sangre: tipo_sangre,
                fech_ingreso: fech_ingreso, id_paciente: id_paciente, dr: dr

            }, function (datos) {
                $('#respuesta').html(datos);
            });
        }



    });


</script>