<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parquealo";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

//testeo de conexion
/*if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}*/


?>

