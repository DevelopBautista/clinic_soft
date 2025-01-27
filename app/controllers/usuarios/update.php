<?php


$id_usuario_get = $_GET['id'];

$sql = "select us.id_usuario,us.nombres,us.cedula,us.direccion,us.tel,us.tipo_sangre,us.fecha_ingreso,us.email ,r.nombre_rol,us.fech_creacion 
        from tb_usuarios as us 
            inner join tb_rol as r ON us.id_rol=r.id_rol 
        where id_usuario='$id_usuario_get'";

$query = $pdo->prepare($sql);

try {
    $query->execute();

    $usuarios_datos = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios_datos as $datos) {
        $id_usuario=$datos['id_usuario'];
        $nombres = $datos['nombres'];
        $cedula = $datos['cedula'];
        $dir = $datos['direccion'];
        $tel = $datos['tel'];
        $tip_sangre = $datos['tipo_sangre'];
        $fech_ingreso = $datos['fecha_ingreso'];
        $email = $datos['email'];
        $rol = $datos['nombre_rol'];
        $fechCreacion = $datos['fech_creacion'];

    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>