<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon API</title>
</head>
<body>

<h1>Lista de Pokémon</h1>

<form action="pokedex.php" method="get">
    <?php
    // Realiza una solicitud a la PokeAPI para obtener la lista de Pokémon
    $pokemonListData = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=1000");
    $pokemonList = json_decode($pokemonListData, true)['results'];

    // Genera un botón para cada Pokémon
    foreach ($pokemonList as $pokemon) {
        $pokemonName = ucfirst($pokemon['name']); // Convierte la primera letra a mayúscula
        $pokemonId = explode('/', rtrim($pokemon['url'], '/'))[count(explode('/', rtrim($pokemon['url'], '/')))-1];
        echo "<button type='submit' name='pokemon' value='{$pokemonId}'>{$pokemonName}</button>";
    }
    ?>
</form>

</body>
</html>