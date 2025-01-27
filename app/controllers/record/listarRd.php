<?php

$sql = "select sv.id_record,sv.codigo_rd,p.nombres_paciente,p.cedula,us.nombres,sv.fech_ingreso,sv.ultima_visita
        from tb_signosVitales as sv 
        inner join tb_usuarios as us on sv.id_usuario=us.id_usuario
        inner join tb_paciente as p on sv.id_paciente=p.id_paciente";

$query = $pdo->prepare($sql);
try {
        $query->execute();
        $signo_datos = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
        echo "<div>" . $e . "</div>";
}

?>