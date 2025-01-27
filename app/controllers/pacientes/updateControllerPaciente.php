<?php
include('../../config.php');
session_start();
$seg_medico = $_POST['segM'];
$tel = $_POST['tel'];
$dire = $_POST['dire'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$ced=$_POST['ced'];
$id = $_POST['id'];


try {

    $consulta = "update tb_paciente
                            
                            set 
                            edad=:edad,
                            cedula=:cedula,
                            seguro_medico=:seguro_medico,
                            tel=:tel,
                            direccion=:direccion,
                            email=:email,
                            fecha_actualizar=:fecha_actualizar 
                            where id_paciente=:id_paciente";

    $query = $pdo->prepare($consulta);

    $query->bindParam('edad', $edad);
    $query->bindParam('cedula', $ced);
    $query->bindParam('seguro_medico', $seg_medico);
    $query->bindParam('tel', $tel);
    $query->bindParam('direccion', $dire);
    $query->bindParam('email', $email);
    $query->bindParam('fecha_actualizar', $fech_hora);
    $query->bindParam('id_paciente', $id);

    try {
        //para ver los errores en tiempo de ejecucion.
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        if ($query->execute()) {
            $_SESSION['mensaje'] = "El paciente se ha actualizado con exito.";
            $_SESSION['icono'] = "success";
            header('location: ' . $url . '/pacientes/listarPacientes.php');

        } else {
            $_SESSION['mensaje'] = "Error en algun campo.";
            $_SESSION['icono'] = "error";
            header('location: ' . $url . '/pacientes/update.php?id=' . $id);
        }


    } catch (Exception $e) {
        echo "<div>" . $e->getMessage() . "</div>";
    }





} catch (Exception $e) {
    echo "<p>" . $e->getMessage() . "</p>";
}



?>