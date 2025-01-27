<?php
include('../../config.php');
session_start();
$id = $_GET['id_cita'];
$sql = "select paciente,medico,title,start,end,color from tb_citas where id='$id'";
try {
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($datos);


} catch (Exception $e) {
    echo "Error :" . $e->getMessage();
}
