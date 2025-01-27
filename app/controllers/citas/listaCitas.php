<?php
include('../../config.php');
session_start();
$sql = "select * from tb_citas";
try {
    $query = $pdo->prepare($sql);
    if ($query->execute()) {
        $citas = $query->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    echo "<div>" . $e . "/div";
}

