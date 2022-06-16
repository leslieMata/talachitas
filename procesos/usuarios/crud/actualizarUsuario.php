<?php
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        'idUsuario' => $_POST ['idUsuario'],
        'paterno' => $_POST ['paternou'],
        'materno' => $_POST ['maternou'],
        'nombre' => $_POST ['nombreu'],
        'fecha_nacimiento' => $_POST ['fecha_nacimientou'],
        'sexo' => $_POST ['sexou'],
        'telefono' => $_POST ['telefonou'],
        'correo' => $_POST ['correou'],
        'usuario' => $_POST ['usuariou'],
        'idRol' => $_POST ['idRolu'],
        'ubicacion' => $_POST ['ubicacionu']
    );
    echo $Usuarios->actualizarUsuario($datos);
?>