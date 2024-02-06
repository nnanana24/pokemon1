<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Cards</title>
    <style>
        .pokemon-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
            cursor: pointer;
        }

        .pokemon-image {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <div id="pokemon-container">
        <?php
        // Obtén nombres de Pokémon y muestra tarjetas
        $pokemonNombres = array('bulbasaur', 'ivysaur', 'venusaur', /*...agrega más nombres aquí...*/);

        foreach ($pokemonNombres as $nombre) {
            echo '<div class="pokemon-card" onclick="mostrarInfoPokemon(\'' . $nombre . '\')">';
            echo '<h2>' . ucfirst($nombre) . '</h2>';
            echo '</div>';
        }
        ?>
    </div>

    <div id="info-container"></div>

    <script>
        function mostrarInfoPokemon(nombrePokemon) {
            // Realiza una solicitud al servidor para obtener información del Pokémon
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Muestra la información en el contenedor de información
                    document.getElementById("info-container").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "obtenerInfoPokemon.php?pokemon=" + nombrePokemon, true);
            xhttp.send();
        }
    </script>
</body>
</html>
