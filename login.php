<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $contra = $_POST["contra"];

    $sql = "SELECT * FROM usuarios WHERE nom='$nom'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["contra"];

        // Depurar valores de contraseñas
        echo "Contraseña proporcionada: " . $contra . "<br>";
        echo "Contraseña almacenada: " . $storedPassword . "<br>";

        if ($contra === $storedPassword) {
            echo "Inicio de sesión exitoso para el usuario: $nom";
            header("location: indes.php");
        } 
        
        else {
            echo "Error: Contraseña incorrecta";
        }
    } else {
        echo "Error: Usuario no encontrado";
    }
    
}

$conn->close();
?>
