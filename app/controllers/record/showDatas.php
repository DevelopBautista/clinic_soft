<?php

$id_record_get = $_GET['id'];

$sql = "select * ,us.nombres,p.nombres_paciente,p.direccion,p.cedula,p.tel
        from tb_signosVitales as sv
        inner join tb_usuarios as us on sv.id_usuario=us.id_usuario
        inner join tb_paciente as p on sv.id_paciente=p.id_paciente 
        
        where id_record='$id_record_get'";

$query = $pdo->prepare($sql);

$query->execute();

$records_datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($records_datos as $datos) {
    $id_paciente = $datos['id_$id_paciente'];
    $codigo_rd = $datos['codigo_rd'];
    $nombre_paciente = $datos['nombres_paciente'];
    $dire=$datos['direccion'];
    $cedula=$datos['cedula'];
    $tel=$datos['tel'];
    $ta = $datos['tension_arterial'];
    $fc = $datos['frecuencia_cardiaca'];
    $tp = $datos['temp_corporal'];
    $peso = $datos['peso'];
    $pr_abdom = $datos['Perim_abdominal'];
    $fr = $datos['frecuencia_respi'];
    $h_enf_actu = $datos['H_enfermedad_actual'];
    $ant_per_pat = $datos['ant_per_patologicos'];
    $ant_fam_pat = $datos['ant_fam_patologicos'];
    $habit_toxicos = $datos['habitos_toxicos'];
    $diag = $datos['diagnostico'];
    $tram = $datos['tratamiento'];
    $ant_qui = $datos['ant_quirurgico'];
    $ant_alerg = $datos['ant_alergico'];
    $tipo_sangre = $datos['tipo_sangre'];
    $fech_ingreso = $datos['fech_ingreso'];
    $ultima_visita=$datos['ultima_visita'];


}




?>