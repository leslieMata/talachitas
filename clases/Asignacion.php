<?php 
    class Asignacion extends Conexion {
        public function agreagarAsignacion($datos) {
            $conexion = parent::Conectar();
            $sql = "INSERT INTO t_asignar (id_persona,
                                        id_equipo,
                                        marca,
                                        modelo,
                                        color,
                                        descripcion,
                                        memoria,
                                        disco_duro,
                                        procesador)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssssss', $datos['idPersona'],
                                            $datos['idEquipo'],
                                            $datos['marca'],
                                            $datos['modelo'],
                                            $datos['color'],
                                            $datos['descripcion'],
                                            $datos['memoria'],
                                            $datos['discoDuro'],
                                            $datos['procesador']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarAsignacion($idAsignacion) {
            $conexion = parent::Conectar();
            $sql = "DELETE FROM t_asignar WHERE id_asignar = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>