<?php

$id = $_GET['id'];

include('../../config.php');
session_start();

$sql = "select  id,id_usuario,paciente,medico,title,start,end,color from tb_citas where id='$id'";
try {
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos = [];
    while ($filas = $query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);

        $datos[] = [
            'id' => $id,
            'id_usuario' => $id_usuario,
            'paciente' => $paciente,
            'medico' => $medico,
            'title' => $title,
            'start' => $start,
            'end' => $end,
            'color' => $color


        ];

    }



} catch (Exception $e) {
    echo "Error :" . $e->getMessage();
}