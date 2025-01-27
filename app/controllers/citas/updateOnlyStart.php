<?php
include('../../config.php');
session_start();
$start = $_POST['start'];
$id = $_POST['id'];

try {
    $consulta = "update tb_citas 
                            set
                            start=:start,
                            end=:end
                            where id=:id";

    $query = $pdo->prepare($consulta);
    $query->bindParam('start', $start);
    $query->bindParam('end', $start);
    $query->bindParam('id', $id);
    //para ver los errores en tiempo de ejecucion.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $query->execute();
} catch (Exception $e) {
    echo $e->getMessage();
}



?>