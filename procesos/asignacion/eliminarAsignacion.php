<?php 
    include "../../clases/Conexion.php";
    include "../../clases/Asignacion.php";
    $idAsignacion = $_POST['idAsignacion'];
    $Asignacion = new Asignacion();
    echo $Asignacion->eliminarAsignacion($idAsignacion);
?>