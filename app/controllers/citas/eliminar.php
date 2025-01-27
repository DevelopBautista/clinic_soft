<?php

include('../../config.php');
session_start();

$id = $_POST['id'];

try {
    $consulta = "delete from  tb_citas where id=:id";

    $query = $pdo->prepare($consulta);

    $query->bindParam('id', $id);

    //para ver los errores en tiempo de ejecucion.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $query->execute();

} catch (Exception $e) {
    echo "<p>" . $e->getMessage() . "</p>";
}