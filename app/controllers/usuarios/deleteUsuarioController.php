<?php
include('../../config.php');
session_start();

$id = $_POST['id'];

$consulta = "delete from  tb_usuarios where id_usuario=:id_usuario";

$query = $pdo->prepare($consulta);

$query->bindParam('id_usuario', $id);

//para ver los errores en tiempo de ejecucion.
error_reporting(E_ALL);
ini_set('display_errors', '1');

$query->execute();
$_SESSION['mensaje'] = "El usuario fue eliminado con exito.";
$_SESSION['icono'] = "success";
header('location: ' . $url . '/usuarios/listarUsuarios.php');




?>