<?php
include('../../config.php');
session_start();

$nombres = $_POST['nombres'];
$cedu = $_POST['ced'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$tip_sangre = $_POST['tip_sangre'];
$fech_ingreso = $_POST['fech_ingreso'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$passUser = $_POST['pswd'];
$passUser_repeat = $_POST['pswd2'];

try {
    if ($passUser == $passUser_repeat) {

        $passUser = password_hash($passUser, PASSWORD_DEFAULT);

        $query = $pdo->prepare("insert into tb_usuarios (nombres,cedula,direccion,tel,tipo_sangre,fecha_ingreso,email,id_rol,password,fech_creacion)
        values(:nombres,:cedula,:direccion,:tel,:tipo_sangre,:fecha_ingreso,:email,:id_rol,:password,:fech_creacion)");

        $query->bindParam('nombres', $nombres);
        $query->bindParam('cedula', $cedu);
        $query->bindParam('direccion', $dir);
        $query->bindParam('tel', $tel);
        $query->bindParam('tipo_sangre', $tip_sangre);
        $query->bindParam('fecha_ingreso', $fech_ingreso);
        $query->bindParam('email', $email);
        $query->bindParam('id_rol', $rol);
        $query->bindParam('password', $passUser);
        $query->bindParam('fech_creacion', $fech_hora);

        //para ver los errores en tiempo de ejecucion.
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        $query->execute();




        $_SESSION['mensaje'] = "El usuario se ha registrado con exito.";
        $_SESSION['icono'] = "success";
        header('location: ' . $url . '/usuarios/listarUsuarios.php');

    } else {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
        $_SESSION['icono'] = "error";
        header('location: ' . $url . '/usuarios/nuevoUsuario.php');
    }

} catch (exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

?>