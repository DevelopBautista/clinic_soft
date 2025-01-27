<?php

$sql = "select us.nombres,us.especialidad,us.fecha_ingreso
from tb_usuarios as us 
inner join tb_rol as rol on us.id_rol=rol.id_rol
where rol.nombre_rol='Doctor'";

$query = $pdo->prepare($sql);
$query->execute();
$doctores_datos = $query->fetchAll(PDO::FETCH_ASSOC);



?>