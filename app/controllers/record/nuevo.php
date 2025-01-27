<?php
include('../../config.php');
session_start();

$codigo = $_POST['codigo'];
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
$tipo_sangre = $_POST['tipo_sangre'];
$fech_ingreso = $_POST['fech_ingreso'];
$paciente = $_POST['id_paciente'];
$dr = $_POST['dr'];

$sql = "insert into tb_signosVitales (codigo_rd,tension_arterial, frecuencia_cardiaca, 
                                                            temp_corporal, peso, Perim_abdominal, 
                                                            frecuencia_respi, H_enfermedad_actual, ant_per_patologicos,
                                                            ant_fam_patologicos, habitos_toxicos, diagnostico, 
                                                            tratamiento, ant_quirurgico, ant_alergico, 
                                                            tipo_sangre, fech_ingreso,ultima_visita, id_paciente, 
                                                            id_usuario)
                                
                                values( :codigo_rd,:tension_arterial, :frecuencia_cardiaca, 
                                        :temp_corporal, :peso, :Perim_abdominal, 
                                        :frecuencia_respi, :H_enfermedad_actual, :ant_per_patologicos,
                                        :ant_fam_patologicos, :habitos_toxicos, :diagnostico, 
                                        :tratamiento, :ant_quirurgico, :ant_alergico, 
                                        :tipo_sangre, :fech_ingreso,:ultima_visita ,:id_paciente, 
                                        :id_usuario)";
$query = $pdo->prepare($sql);

$query->bindParam('codigo_rd', $codigo);
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
$query->bindParam('tipo_sangre', $tipo_sangre);
$query->bindParam('fech_ingreso', $fech_ingreso);
$query->bindParam('ultima_visita', $fech_ingreso);
$query->bindParam('id_paciente', $paciente);
$query->bindParam('id_usuario', $dr);


try {
    if ($query->execute()) {

        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        $_SESSION['mensaje'] = "El record se ha registrado con exito.";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href = "<?php echo $url ?>/records/listar.php";
        </script>
        <?php
    } else {
        $_SESSION['mensaje'] = "Problema con el registro";
        $_SESSION['icono'] = "error";
        header('location: ' . $url . '/records/nuevo.php');
    }

    


} catch (Exception $e) {
    echo "<div>" . $e->getMessage() . "</div>";
}

echo "<scrip> console.log('Datos'.$ta.');</scrip>";


