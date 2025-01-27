<?php

//sweetAlert
if ((isset($_SESSION['mensaje'])) && isset($_SESSION['icono'])) {
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>

    <script>
        Swal.fire({
            text: "<?php echo $mensaje ?>",
            icon: "<?php echo $icono ?>",
            showConfirmButton: false,
            timer: 2900

        });
    </script>

    <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}

?>