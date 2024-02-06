<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokedex";
$port = "3306";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>