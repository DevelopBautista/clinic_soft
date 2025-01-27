<?php
session_start();
include('../../config.php');//importando la conexion
include('../../../layout/sessiones.php');

$email = $_POST['email'];
$usuarioPass = $_POST['password'];

$contador = 0;
$sql = "select *,r.nombre_rol,r.id_rol
                from tb_usuarios as us 
                inner join tb_rol as r ON us.id_rol=r.id_rol
                where email='$email'";

$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

try {
    foreach ($usuarios as $usuario) {
        $contador += 1;
        $email_tb = $usuario['email'];
        $usuarioPass_tb = $usuario['password'];
        $nombres_tb = $usuario['nombres'];
        $id_rol = $usuario['id_rol'];
    }
    if (($contador != 0) && password_verify($usuarioPass, $usuarioPass_tb)) {
        $_SESSION['email'] = $email;
        switch ($id_rol) {
            case 1:
                header('location:' . $url . '/index.php');
                break;
            case 2:
                header('location:' . $url . '/asistente.php');
                break;
            case 3:
                header('location:' . $url . '/doctor.php');
                break;

            default:
                # code...
                break;
        }


    } else {
        $_SESSION['mensaje'] = "Datos incorrecto.";
        header('location:' . $url . '/login/login.php');
    }

    if ($email == "" || $usuarioPass == "") {
        $_SESSION['mensaje'] = "Debe ingresar usuario O clave.";
        header('location:' . $url . '/login/login.php');
    }

} catch (Exception $e) {
    echo "<div>" . $e->getMessage() . "</div>";
}

?>