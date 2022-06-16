<?php  
    session_start();
    include "../../clases/Conexion.php";
    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    $datos =array(
        'idReporte' => $_POST['idReporte'],
        'solucion' => $_POST['solucion'],
        'estatus' => $_POST['estatus'],
        'idUsiario' => $_SESSION['usuario']['id']
    );
    echo $Reportes->actualizarSolucion($datos);
?>