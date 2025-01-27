<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Iniciar - ClinicSoft</title>
  <link rel="stylesheet" href="<?php echo $url ?>../public/css/login.css">
  <link rel="icon" type="image/x-svg" href="../public/img/icono.svg">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <form class="login" action="<?php echo $url ?>../app/controllers/login/contraladorLogin.php" method="post"
    name="login">
    <h2>Clinic Soft</h2>
    <img loading="lazy" src="<?php echo $url ?>../public/img/logo.svg">
    <input type="email" name="email" placeholder="Usuario" class="bordes" autofocus />
    <input type="password" name="password" placeholder="Contraseña" class="bordes" />
    <input type="submit" value="Ingresar">
  </form>

  <!--code para sweetalert error-->
  <?php
  session_start();
  if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje']; ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "<?php echo $mensaje ?>",
      });
    </script>
    <?php
    unset($_SESSION['mensaje']);
  }
  ?>
</body>

</html>