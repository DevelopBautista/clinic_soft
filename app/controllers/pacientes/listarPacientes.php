<?php
include('../../config.php');
session_start();

$sql = "select * from tb_paciente";

$query = $pdo->prepare($sql);
$query->execute();
$pacientes_datos = $query->fetchAll(PDO::FETCH_ASSOC);





?>