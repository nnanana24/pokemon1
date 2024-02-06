<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Cards</title>
    <style>
        .pokemon-card {
            border: 13px solid #blue;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .pokemon-image {
            max-width: 100px;
        }
    </style>
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
            echo '<div class="pokemon-card">';
            echo '<h2>' . ucfirst($pokemon_data['name']) . '</h2>';
            echo '<img class="pokemon-image" src="' . $pokemon_data['sprites']['front_default'] . '" alt="' . $pokemon_data['name'] . '">';
            echo '<p>Altura: ' . $pokemon_data['height'] . '</p>';
            echo '<p>Peso: ' . $pokemon_data['weight'] . '</p>';
            echo '</div>';
        } else {
            echo "Error al decodificar los datos JSON.";
        }
    } else {
        echo "Error al realizar la solicitud a la API.";
    }

    curl_close($ch);
}

// Obtén nombres de Pokémon y muestra tarjetas
$pokemonNombres = array('bulbasaur', 'ivysaur', 'venusaur', /*...agrega más nombres aquí...*/);
$pokemonListData = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=1000");
$pokemonList = json_decode($pokemonListData, true)['results'];
foreach ($pokemonNombres as $nombre) {
    obtenerInfoPokemon($nombre);
}
?>
</body>
</html>