<?php 
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $idUsuario = $_POST['idUsuario'];
    echo json_encode($Usuarios->obtenerDatosUsuario($idUsuario));
?>