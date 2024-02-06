<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nom = $_POST["nom"];
    $correo = $_POST["correo"];
    $contra = password_hash($_POST["contra"], PASSWORD_DEFAULT);

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nom, correo, contra) VALUES ('$nom', '$correo', '$contra')";
    header("location: indes.php");

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso para el usuario: $nom";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
