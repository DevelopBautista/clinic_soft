<?php
$server = 'mysql:host=localhost;dbname=centromedico';
$usuario = 'root';
$contraseña = 'Admin@1320';
$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', );

try {
    $pdo = new PDO($server, $usuario, $contraseña, $opciones);
} catch (PDOException $ex) {
    printf($ex);
}

$url = "http://localhost/sistema_clinico";
date_default_timezone_set('America/Santo_Domingo');
$fech_hora = date('Y-m-d h:i:s');



?>