<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/usuarios/listarUsuarios.php");
include("../app/controllers/citas/update_cita.php");

include('../layout/superior.php');
?>

<div class="content-wrapper">
    <div class="col-md-12">
        <br><br>
        <h1 style="text-align: center">Reservar Cita</h1>
    </div>

    <div class="container">
        <div id='calendar'></div>
    </div>
</div>

<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>

<!--modal para ingresar datos al calendario-->
<div class="modal " id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;color:white">
                <h4 class="modal-title" id="tituloModal"></h4>
            </div>
            <div class="modal-body">
                <form id="frm">
                    <!--f01-->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Descripcion:</label>
                            <input type="text" id="id" hidden>
                            <input type="text" class="form-control" id="titulo">
                            <input type="text" id="usuario" value="<?php echo $id_usuario; ?>" hidden>
                        </div>
                    </div>
                    <!--f02-->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Paciente:</label>
                            <input type="text" class="form-control" id="paciente">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Horario:</label>
                            <input type="datetime-local" class="form-control" id="hora_fecha">
                        </div>
                    </div>
                    <!--f03-->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Medico:</label>
                            <input type="text" class="form-control" id="medico">
                        </div>
                    </div>
                    <!--f04-->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Color:</label>
                            <input type="color" class="form-control" id="color">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btn_add"><i
                                class="fa-solid fa-plus"></i>Agregar</button>
                        <button type="button" class="btn btn-warning" id="btn_edit"><i
                                class="fa-regular fa-pen-to-square"></i>Actualizar</button>
                        <button type="button" class="btn btn-danger" id="btn_del"><i
                                class="fa-solid fa-trash-can"></i>Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa-solid fa-ban"></i>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--modal_ver_detalles_eventos-->
<div class="modal" id="modal_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#4c5ffc;color:white">
                <h5 class="modal-title">Infomacion de la cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3" style="color:blue">Descripcion:</dt>
                    <dd class="col-sm-9" id="descrip"></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3" style="color:blue">Paciente:</dt>
                    <dd class="col-sm-9" id="pac"></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3" style="color:blue">Fecha y Hora:</dt>
                    <dd class="col-sm-9" id="fechaHora"></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3" style="color:blue">Doctor:</dt>
                    <dd class="col-sm-9" id="dr"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btn_editar"><i
                        class="fa-regular fa-pen-to-square"></i>Editar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fa-solid fa-ban"></i>Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!--variables-->
<script>
    function formatearFecha(fecha) {
        const anio = fecha.getFullYear();
        const mes = String(fecha.getMonth() + 1).padStart(2, '0'); // Los meses comienzan desde 0
        const dia = String(fecha.getDate()).padStart(2, '0');
        return anio + '-' + mes + '-' + dia;
    }
    var base = "<?php echo $url; ?>";
    var fecha;
    var calendar;
    var id_evento;
    var fecha_actual;
    var fecha_pasada;
    var frm = document.getElementById('frm');
    var myModal;
    var modal_info;
    document.addEventListener('DOMContentLoaded', function () {
        // Inicialización del modal
        myModal = new bootstrap.Modal(document.getElementById('myModal'));
        modal_info = new bootstrap.Modal(document.getElementById('modal_info'));
        // Inicialización del calendario
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonIcons: true, // mostrar el texto anterior / siguiente
            editable: false,
            selectable: true,
            events: {
                url: base + "/app/controllers/citas/listar.php",
            },
            dateClick: function (info) {

                frm.reset();
                fecha = info.dateStr;

                /obtenemos la fecha actual/

                var fecha_actual = new Date();
                var fecha_actual_formateada = formatearFecha(fecha_actual);

                /obtenemos la fecha seleccionada/


                var fecha_seleccionada_str = info.dateStr;
                var fecha_seleccionada = new Date(fecha_seleccionada_str);
                fecha_seleccionada.setDate(fecha_seleccionada.getDate() + 1);
                var fecha_seleccionada_formateada = formatearFecha(fecha_seleccionada);

                const fechaCadena = fecha;
                var numerosDias = new Date(fechaCadena).getDay();
                var dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

                /informamos la salida de las fechas formateadas para comparar/
                console.log("fecha seleccionada :" + fecha_seleccionada_formateada);
                console.log("fecha actual : " + fecha_actual_formateada);



                if (numerosDias == "6") {
                    Swal.fire({
                        title: "Aviso!",
                        text: "Dia no laborable",
                        icon: "warning"
                    });
                } else {
                    if (fecha_seleccionada_formateada >= fecha_actual_formateada) {
                        $("#hora_fecha").val(converterData(fecha));
                        document.getElementById("btn_add").classList.remove('d-none');
                        document.getElementById("btn_edit").classList.add('d-none');
                        document.getElementById("btn_del").classList.add('d-none');
                        document.getElementById('tituloModal').textContent = "Agendar nueva cita";
                        myModal.show();
                    } else {
                        Swal.fire({
                            title: "Aviso!",
                            text: "No se puede agendar citas",
                            icon: "warning"
                        });
                    }
                }


            },
            eventClick: function (info) {
                var url = base + '/app/controllers/citas/getDatas.php';
                var id_cita = info.event.id;
                $.get(url, { id_cita: id_cita }, function (data) {
                    var datos = JSON.parse(data);//aqui covertidos el json en un objecto

                    document.getElementById('descrip').innerText = info.event.title;
                    document.getElementById('pac').innerText = datos.paciente;
                    document.getElementById('fechaHora').innerText = converterData(info.event.start);
                    document.getElementById('dr').innerText = datos.medico;
                    modal_info.show();

                    //se puede?

                    $("#btn_editar").click(function () {
                        modal_info.hide();
                        //-----------------------------------------------------------------
                        document.getElementById("btn_edit").classList.remove('d-none');
                        document.getElementById("btn_del").classList.remove('d-none');
                        document.getElementById("btn_add").classList.add('d-none');
                        document.getElementById('tituloModal').textContent = "Modificar cita agendada";
                        $("#id").val(id_cita);
                        $("#titulo").val(info.event.title);
                        $("#hora_fecha").val(converterData(info.event.start));
                        $("#color").val(info.event.backgroundColor);
                        $("#paciente").val(datos.paciente);
                        $("#medico").val(datos.medico);
                        myModal.show();
                    });
                });
            },

        });
        calendar.render();
    });

    // Guardar
    $('#btn_add').click(function () {
        var url = base + '/app/controllers/citas/nueva.php';
        var titulo = $('#titulo').val();
        var paciente = $('#paciente').val();
        var medico = $('#medico').val();
        var usuario = $('#usuario').val();
        var start = $('#hora_fecha').val();
        var color = $('#color').val();

        if (titulo == "" || paciente == "" || start == "" || medico == "" || color == "") {
            Swal.fire({
                title: "Aviso",
                text: "Todos los campos son requeridos",
                icon: "warning"
            });
        } else {
            $.post(url, {
                titulo: titulo,
                paciente: paciente,
                start: start,
                medico: medico,
                color: color,
                usuario: usuario
            }, function (datos) {
                $('#respuesta').html(datos);

                // Refrescar eventos después de guardar
                calendar.refetchEvents();
            });

            // Ocultar modal después de guardar
            myModal.hide();

            Swal.fire({
                title: "Aviso",
                text: "Se ha agendado la cita con éxito.",
                icon: "success"
            });
        }
    });

    //editar
    $('#btn_edit').click(function () {
        var url = base + '/app/controllers/citas/update_start.php';
        var title = $("#titulo").val();
        var start = $('#hora_fecha').val();
        var color = $("#color").val();
        var id = $('#id').val();


        if (titulo == "" || start == "") {
            Swal.fire({
                title: "Aviso",
                text: "Todos los campos son requeridos",
                icon: "warning"
            });
        } else {
            $.post(url, {
                title: title,
                start: start,
                color: color,
                id: id
            }, function (datos) {
                $('#respuesta').html(datos);

                // Refrescar eventos después de guardar
                calendar.refetchEvents();
            });
            Swal.fire({
                title: "Aviso",
                text: "Se ha actualizado la cita con éxito.",
                icon: "success"
            });
            // Ocultar modal después de guardar
            myModal.hide();
        }

    });

    //eliminar
    $('#btn_del').click(function () {
        var url = base + '/app/controllers/citas/eliminar.php';
        var id = $('#id').val();

        Swal.fire({
            title: "¿Estas decuerdo?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡bórralo!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    id: id
                }, function (datos) {
                    $('#respuesta').html(datos);

                    // Refrescar eventos después de guardar
                    calendar.refetchEvents();
                });

                Swal.fire({
                    title: "Borrado!",
                    text: "La cita ha sido borrada!.",
                    icon: "success"
                });

                // Ocultar modal después de guardar
                myModal.hide();
            }
        });

    });


    function converterData(data) {


        const dataObj = new Date(data);

        const ano = dataObj.getFullYear();

        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');

        const dia = String(dataObj.getDate()).padStart(2, '0');

        const hora = String(dataObj.getHours()).padStart(2, '0');

        const minuto = String(dataObj.getMinutes()).padStart(2, '0');

        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    }



</script>


<div id="respuesta"></div>