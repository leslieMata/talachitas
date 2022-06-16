<?php 
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "paterno" => $_POST ['paterno'],
        "materno" => $_POST ['materno'],
        "nombre" => $_POST ['nombre'],
        "fecha_nacimiento" => $_POST ['fecha_nacimiento'],
        "sexo" => $_POST ['sexo'],
        "telefono" => $_POST ['telefono'],
        "correo" => $_POST ['correo'],
        "usuario" => $_POST ['usuario'],
        "password" => sha1($_POST ['password']),
        "idRol" => $_POST ['idRol'],
        "ubicacion" => $_POST ['ubicacion']
    );
    echo $Usuarios->agregaNuevoUsuario($datos);
?>