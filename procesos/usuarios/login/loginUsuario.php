<?php
    session_start();
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);
    $Usuarios = new Usuarios();
    echo $Usuarios->loginUsuario($usuario, $password);
?>