<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Conexion.php";
    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    $datos = array(
        'idEquipo' => $_POST['idEquipo'],
        'problema' => $_POST['problema'],
        'idUsuario' => $idUsuario
    );
    echo $Reportes->agregarReporteCliente($datos);
?>