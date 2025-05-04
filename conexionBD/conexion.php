<?php
    class ConexionBD {
        function conexionBD() {
            $host = "localhost";
            $bdname = "firstproyect";
            $username = "postgres";
            $pasword = "q1w2e3r4";

            try {
                $conn = new PDO("pgsql:host=$host;dbname=$bdname", $username, $pasword);
                echo "conexion exitosa"; 
            } catch(PDOException $e) {
                echo ("No se pudo conectar a la base de datos" . $e);
            }
       
        return $conn;
        }
    }

?>