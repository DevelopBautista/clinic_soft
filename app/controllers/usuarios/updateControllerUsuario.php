<?php
include('../../config.php');
session_start();

$dir = $_POST['dir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$passUser = $_POST['pswd'];
$passUser_repeat = $_POST['pswd2'];
$id = $_POST['id'];
$rol = $_POST['rol'];



try {
    if ($passUser == "") {// opcion para cuando el usuario no ha cambiado la clave
        if ($passUser == $passUser_repeat) {

            $passUser = password_hash($passUser, PASSWORD_DEFAULT);

            $consulta = "update tb_usuarios 
                            set
                                direccion=:direccion,
                                tel=:tel,
                                email=:email,id_rol=:id_rol,
                                fech_actualizar=:fech_actualizar 
                            where id_usuario=:id_usuario";

            $query = $pdo->prepare($consulta);

            $query->bindParam('direccion', $dir);
            $query->bindParam('tel', $tel);
            $query->bindParam('email', $email);
            $query->bindParam('id_rol', $rol);
            $query->bindParam('fech_actualizar', $fech_hora);
            $query->bindParam('id_usuario', $id);

            //para ver los errores en tiempo de ejecucion.
            error_reporting(E_ALL);
            ini_set('display_errors', '1');

            $query->execute();




            $_SESSION['mensaje'] = "El usuario se ha actualizado con exito.";
            $_SESSION['icono'] = "success";
            header('location: ' . $url . '/usuarios/listarUsuarios.php');

        } else {
            $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
            $_SESSION['icono'] = "error";
            header('location: ' . $url . '/usuarios/update.php?id=' . $id);
        }
    } else {// opcion para cuando el usuario  ha cambiado la clave
        if ($passUser == $passUser_repeat) {

            $passUser = password_hash($passUser, PASSWORD_DEFAULT);

            $consulta = "update tb_usuarios 
                            set direccion=:direccion,
                                tel=:tel,
                                email=:email,
                                id_rol=:id_rol,
                                password=:password,
                                fech_actualizar=:fech_actualizar
                            where id_usuario=:id_usuario";

            $query = $pdo->prepare($consulta);

            $query->bindParam('direccion', $dir);
            $query->bindParam('tel', $tel);
            $query->bindParam('email', $email);
            $query->bindParam('id_rol', $rol);
            $query->bindParam('password', $passUser);
            $query->bindParam('fech_actualizar', $fech_hora);
            $query->bindParam('id_usuario', $id);


            //para ver los errores en tiempo de ejecucion.
            error_reporting(E_ALL);
            ini_set('display_errors', '1');

            $query->execute();




            $_SESSION['mensaje'] = "El usuario se ha actualizado con exito.";
            $_SESSION['icono'] = "success";
            header('location: ' . $url . '/usuarios/listarUsuarios.php');

        } else {
            $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
            $_SESSION['icono'] = "error";
            header('location: ' . $url . '/usuarios/update.php?id=' . $id);
        }
    }

} catch (Exception $e) {
    echo '<div class="container col-sm">' . '<p style="color:white;background:green">' . $e->getMessage() . '</p>' . '</div>';
}



?>