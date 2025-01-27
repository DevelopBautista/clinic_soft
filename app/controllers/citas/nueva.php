<?php
include('../../config.php');
session_start();


$paciente = $_POST['paciente'];
$medico = $_POST['medico'];
$titulo = $_POST['titulo'];
$usuario = $_POST['usuario'];
$hora_fecha = $_POST['start'];
$color = $_POST['color'];

$sql = "insert into tb_citas(id_usuario, paciente, medico, title, start, end, color) 
                values (:id_usuario,
                        :paciente,
                        :medico,
                        :title,
                        :start,
                        :end,
                        :color)";
try {
    $query = $pdo->prepare($sql);
    $query->bindParam('id_usuario', $usuario);
    $query->bindParam('paciente', $paciente);
    $query->bindParam('medico', $medico);
    $query->bindParam('title', $titulo);
    $query->bindParam('start', $hora_fecha);
    $query->bindParam('end', $hora_fecha);
    $query->bindParam('color', $color);

    //para ver los errores en tiempo de ejecucion.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $query->execute();
} catch (\Exception $e) {
    echo "<p>" . $e . "</p>";
}




?>