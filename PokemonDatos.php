<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function obtenerInfoPokemon($nombrePokemon) {
    $urlAPI = "https://pokeapi.co/api/v2/pokemon/" . strtolower($nombrePokemon);

    $ch = curl_init($urlAPI);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $datosPokemon = curl_exec($ch);

    if ($datosPokemon !== false) {
        $pokemon_data = json_decode($datosPokemon, true);

        // Verifica si la decodificación JSON fue exitosa
        if (json_last_error() === JSON_ERROR_NONE) {
            // Muestra la información básica

            echo '<img src="' . $pokemon_data['sprites']['front_default'] . '" alt="' . $pokemon_data['name'] . '">';
            echo '<h1>' . ucfirst($pokemon_data['name']) . '</h1>';
           
            echo "Nombre: " . ucfirst($pokemon_data['name']) . "<br>";
            echo "Altura: " . $pokemon_data['height'] . "<br>";
            echo "Peso: " . $pokemon_data['weight'] . "<br>";

            // Muestra las habilidades
            echo "<h2>Habilidades:</h2>";
            echo "<ul>";
            foreach ($pokemon_data['abilities'] as $ability) {
                echo "<li>" . ucfirst($ability['ability']['name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Error al decodificar los datos JSON.";
        }
    } else {
        echo "Error al realizar la solicitud a la API.";
    }

    curl_close($ch);
}


?>
    
</body>
</html>
