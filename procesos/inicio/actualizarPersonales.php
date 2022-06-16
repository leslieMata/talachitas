<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Conexion.php";
    include "../../clases/Inicio.php";
    $Inicio = new Inicio();
    $datos = array(
        'paterno'=> $_POST['paternoInicio'],
        'materno'=> $_POST['maternoInicio'],
        'nombre'=> $_POST['nombreInicio'],
        'telefono'=> $_POST['telefonoInicio'],
        'correo'=> $_POST['correoInicio'],
        'fecha'=> $_POST['fechaNacInicio'],
        'idUsuario' => $idUsuario
    );
    echo $Inicio->actualizarPersonales($datos);
?>