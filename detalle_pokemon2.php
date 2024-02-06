<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pokémon</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            background: url('https://i.pinimg.com/originals/71/31/77/713177e7b221e3d2570237268fd19c6e.gif') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            background-color: red;
            border-radius: 20px; /* Aumenta el radio de borde para dar un aspecto más redondeado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px; /* Aumenta el tamaño del padding para hacer la tarjeta más grande */
            text-align: center;
        }

        h1 {
            color: #fff; /* Ajusta el color del texto según tu imagen de fondo */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        img {
            max-width: 100%;
            border-radius: 15px; /* Aumenta el radio de borde para dar un aspecto más redondeado */
            margin-top: 20px; /* Ajusta el espacio entre el nombre y la imagen */
        }

        h2 {
            color: #fff; /* Ajusta el color del texto según tu imagen de fondo */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-top: 20px; /* Ajusta el espacio entre la imagen y las habilidades */
        }

        ul {
            list-style-type: none;
            padding: 0;
            color: #fff; /* Ajusta el color del texto según tu imagen de fondo */
        }

        li {
            margin-bottom: 15px; /* Ajusta el espacio entre las habilidades */
        }

        button {
            background-color: #e74c3c; /* Rojo */
            color: white;
            padding: 15px 30px; /* Aumenta el tamaño del padding para hacer el botón más grande */
            border: none;
            border-radius: 10px; /* Aumenta el radio de borde para dar un aspecto más redondeado */
            margin-top: 20px; /* Ajusta el espacio entre las habilidades y el botón */
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px; /* Aumenta el tamaño de la fuente del botón */
        }

        button:hover {
            background-color: #c0392b; /* Rojo más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>

<?php
if (isset($_GET['pokemon'])) {
    // Obtiene el ID del Pokémon seleccionado
    $pokemonId = $_GET['pokemon'];

    // Realiza una solicitud a la PokeAPI para obtener detalles del Pokémon
    $pokemonData = file_get_contents("https://pokeapi.co/api/v2/pokemon/{$pokemonId}");
    $pokemonDetails = json_decode($pokemonData, true);

    // Muestra la imagen del Pokémon
    echo '<div class="card">';
    echo "<h1>{$pokemonDetails['name']}</h1>";
    echo "<img src='{$pokemonDetails['sprites']['front_default']}' alt='{$pokemonDetails['name']}'>";
    echo "<h2>Habilidades:</h2>";
    echo "<ul>";
    foreach ($pokemonDetails['abilities'] as $ability) {
        echo "<li>{$ability['ability']['name']}</li>";
    }
    echo "</ul>";
    echo '<button type="button">Atrás</button>';
    echo '</div>';
} else {
    // Si no se proporciona un ID de Pokémon, muestra un mensaje de error
    echo "<p>No se ha seleccionado ningún Pokémon.</p>";
}
?>

</body>
</html>
