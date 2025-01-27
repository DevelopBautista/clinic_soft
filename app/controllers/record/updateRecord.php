<?php
include('../../config.php');
session_start();

$ta = $_POST['ta'];
$fc = $_POST['fc'];
$tp = $_POST['tp'];
$peso = $_POST['peso'];
$pr_abdom = $_POST['pr_abdom'];
$fr = $_POST['fr'];
$h_enf_actu = $_POST['h_enf_actu'];
$ant_per_pat = $_POST['ant_per_pat'];
$ant_fam_pat = $_POST['ant_fam_pat'];
$habit_toxicos = $_POST['habit_toxicos'];
$diag = $_POST['diag'];
$tram = $_POST['tram'];
$ant_qui = $_POST['ant_qui'];
$ant_alerg = $_POST['ant_alerg'];
$ult_visita = $_POST['ult_visita'];
$id = $_POST['id_record'];

$sql = "update tb_signosVitales set 
                                    tension_arterial=:tension_arterial,
                                    frecuencia_cardiaca=:frecuencia_cardiaca,
                                    temp_corporal=:temp_corporal,
                                    peso=:peso,
                                    Perim_abdominal=:Perim_abdominal,
                                    frecuencia_respi=:frecuencia_respi,
                                    H_enfermedad_actual=:H_enfermedad_actual,
                                    ant_per_patologicos=:ant_per_patologicos,
                                    ant_fam_patologicos=:ant_fam_patologicos,
                                    habitos_toxicos=:habitos_toxicos,
                                    diagnostico=:diagnostico,
                                    tratamiento=:tratamiento,
                                    ant_quirurgico=:ant_quirurgico,
                                    ant_alergico=:ant_alergico,
                                    ultima_visita=:ultima_visita
                                   
                                    where id_record=:id_record";






try {
    $query = $pdo->prepare($sql);


    $query->bindParam('tension_arterial', $ta);
    $query->bindParam('frecuencia_cardiaca', $fc);
    $query->bindParam('temp_corporal', $tp);
    $query->bindParam('peso', $peso);
    $query->bindParam('Perim_abdominal', $pr_abdom);
    $query->bindParam('frecuencia_respi', $fr);
    $query->bindParam('H_enfermedad_actual', $h_enf_actu);
    $query->bindParam('ant_per_patologicos', $ant_per_pat);
    $query->bindParam('ant_fam_patologicos', $ant_fam_pat);
    $query->bindParam('habitos_toxicos', $habit_toxicos);
    $query->bindParam('diagnostico', $diag);
    $query->bindParam('tratamiento', $tram);
    $query->bindParam('ant_quirurgico', $ant_qui);
    $query->bindParam('ant_alergico', $ant_alerg);
    $query->bindParam('ultima_visita', $ult_visita);
    $query->bindParam('id_record', $id);


    if ($query->execute()) {
        $_SESSION['mensaje'] = "El record se ha actualizado con exito.";
        $_SESSION['icono'] = "success";
        header('location: ' . $url . '/records/listar.php');

    } else {
        $_SESSION['mensaje'] = "Error en algun campo.";
        $_SESSION['icono'] = "error";
        header('location: ' . $url . '/records/update.php?id=' . $id);
    }

} catch (Exception $e) {
    echo "<div>" . $e->getMessage() . "</div>";
}

echo "<script> console.log('Datos :".$ult_visita."');</script>";





