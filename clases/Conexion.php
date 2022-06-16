<?php 
    class Conexion {
        public function Conectar() {
            try {
                return mysqli_connect(
                    'localhost',
                    'root',
                    '12345',
                    'helpdesk',
                    '3305'
                );
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }
?>      