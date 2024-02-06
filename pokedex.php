<?php
if (isset($_GET['pokemon'])) {
    $pokemonId = $_GET['pokemon'];

    // Realiza la solicitud a la PokeAPI para obtener la información del Pokémon
    $pokemonData = file_get_contents("https://pokeapi.co/api/v2/pokemon/{$pokemonId}/");
    $pokemonInfo = json_decode($pokemonData, true);

    // Muestra la información del Pokémon
    echo "<h1>{$pokemonInfo['name']}</h1>";
    echo "<h2>Habilidades:</h2>";
    echo "<ul>";
    foreach ($pokemonInfo['abilities'] as $ability) {
        echo "<li>{$ability['ability']['name']}</li>";
    }
    echo "</ul>";
}
?>