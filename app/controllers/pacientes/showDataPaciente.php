<?php
include('../../config.php');
session_start();
$id_paciente_get = $_GET['id'];

$sql = "select * from tb_paciente where id_paciente='$id_paciente_get'";

$query = $pdo->prepare($sql);

$query->execute();

$paciente_datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($paciente_datos as $datos) {
    $codigo = $datos['codigo'];
    $nombres_paciente = $datos['nombres_paciente'];
    $sexo = $datos['sexo'];
    $edad = $datos['edad'];
    $cedula = $datos['cedula'];
    $seg_medico = $datos['seguro_medico'];
    $tel = $datos['tel'];
    $dire = $datos['direccion'];
    $email = $datos['email'];
    $fech_ingreso = $datos['fecha_ingreso'];


}
