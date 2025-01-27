<?php
include('../../config.php');
session_start();
$title = $_POST['title'];
$start = $_POST['start'];
$color = $_POST['color'];
$id = $_POST['id'];

try {
    $consulta = "update tb_citas 
                            set
                            title=:title,
                            start=:start,
                            end=:end,
                            color=:color
                            where id=:id";

    $query = $pdo->prepare($consulta);
    $query->bindParam('title', $title);
    $query->bindParam('start', $start);
    $query->bindParam('end', $start);
    $query->bindParam('color', $color);
    $query->bindParam('id', $id);
    //para ver los errores en tiempo de ejecucion.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $query->execute();
} catch (Exception $e) {
    echo '<div class="container col-sm">' . '<p style="color:white;background:green">' . $e->getMessage() . '</p>' . '</div>';
}



?>