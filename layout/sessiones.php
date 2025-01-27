<?php
include("app/config.php");
session_start();
if (isset($_SESSION['email'])) {
    $seccion = $_SESSION['email'];

    $sql = "select us.id_usuario,us.nombres,us.email ,r.nombre_rol,r.id_rol
            from tb_usuarios as us 
            inner join tb_rol as r ON us.id_rol=r.id_rol
            where email='$seccion'";
    $query = $pdo->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $id_usuario = $usuario['id_usuario'];
        $nombres_tb = $usuario['nombres'];
        $rol_tb = $usuario['nombre_rol'];
        $id_rol = $usuario['id_rol'];

    }

} else {
    header('location:' . $url . '/login/login.php');
}
?>