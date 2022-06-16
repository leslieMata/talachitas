<?php 
    include "../../clases/Conexion.php";
    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    $idReporte = $_POST['idReporte'];
    echo json_encode($Reportes->obtenerSolucion($idReporte));
?>