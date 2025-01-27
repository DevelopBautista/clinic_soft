<?php
include('../../config.php');
session_start();

$codigo = $_POST['codigo'];
$nombres = $_POST['nombres'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];
$ced = $_POST['ced'];
$segM = $_POST['segM'];
$tel = $_POST['tel'];
$dire = $_POST['dire'];
$email = $_POST['email'];
$fech_ingreso = $_POST['fech_ingreso'];

$sql = "insert into tb_paciente (codigo,nombres_paciente,sexo,edad,cedula,seguro_medico,tel,direccion,email,fecha_ingreso,fecha_creacion)
    values(:codigo,:nombres_paciente,:sexo,:edad,:cedula,:seguro_medico,:tel,:direccion,:email,:fecha_ingreso,:fecha_creacion)";

try {
    $query = $pdo->prepare($sql);

    $query->bindParam('codigo', $codigo);
    $query->bindParam('nombres_paciente', $nombres);
    $query->bindParam('sexo', $sexo);
    $query->bindParam('edad', $edad);
    $query->bindParam('cedula', $ced);
    $query->bindParam('seguro_medico', $segM);
    $query->bindParam('tel', $tel);
    $query->bindParam('direccion', $dire);
    $query->bindParam('email', $email);
    $query->bindParam('fecha_ingreso', $fech_ingreso);
    $query->bindParam('fecha_creacion', $fech_hora);

    //para ver los errores en tiempo de ejecucion.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if ($query->execute()) {
        $_SESSION['mensaje'] = "El paciente se ha registrado con exito.";
        $_SESSION['icono'] = "success";
        header('location: ' . $url . '/pacientes/listarPacientes.php');
    } else {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
        $_SESSION['icono'] = "error";
        header('location: ' . $url . '/pacientes/nuevoPaciente.php');
    }
} catch (\Exception $e) {
    echo "<div>" . $e . "</div>";
}


?>