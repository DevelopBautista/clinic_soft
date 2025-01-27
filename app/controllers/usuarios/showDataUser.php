<?php

$id_usuario_get = $_GET['id'];

$sql = "select *,r.nombre_rol,us.fech_creacion 
        from tb_usuarios as us 
            inner join tb_rol as r ON us.id_rol=r.id_rol 
        where id_usuario='$id_usuario_get'";

$query = $pdo->prepare($sql);

$query->execute();

$usuarios_datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $datos) {
    $nombres = $datos['nombres'];
    $cedula = $datos['cedula'];
    $dir=$datos['direccion'];
    $tel = $datos['tel'];
    $tip_sangre = $datos['tipo_sangre'];
    $fech_ingreso = $datos['fecha_ingreso'];
    $email = $datos['email'];
    $nombre_rol = $datos['nombre_rol'];
}

?>