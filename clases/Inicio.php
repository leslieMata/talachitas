<?php 
    class Inicio extends Conexion {
        public function actualizarPersonales($datos) {
            $conexion = parent::Conectar();
            $idUsuario = $datos['idUsuario'];
            $sql = "SELECT id_persona FROM t_usuarios WHERE id_usuario = '$idUsuario'"; 
            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)[0];
            $sql = "UPDATE t_persona 
                    SET 
                        paterno = ?,
                        materno = ?,
                        nombre = ?,
                        telefono = ?,
                        correo = ?,
                        fecha_nacimiento = ?
                    WHERE
                        id_persona = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssi', $datos['paterno'],
                                            $datos['materno'],
                                            $datos['nombre'],
                                            $datos['telefono'],
                                            $datos['correo'],
                                            $datos['fecha'],
                                            $idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>