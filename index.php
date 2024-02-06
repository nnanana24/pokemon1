<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Lista</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background: url('https://i.pinimg.com/originals/71/31/77/713177e7b221e3d2570237268fd19c6e.gif') no-repeat center center fixed;
            background-size: cover;
        }

        nav {
            background-color: #333;
            padding: 10px 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline;
            margin-right: 20px;
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        a:hover {
            color: #ffc107; /* Cambia el color al pasar el ratón */
        }

        h1 {
            color: #fff; /* Ajusta el color del texto según tu imagen de fondo */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 0;
        }

        button {
            background-color: #e74c3c; /* Rojo */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 15px;
            margin: 5px;
        }

        button:hover {
            background-color: #c0392b; /* Rojo más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="indes.php">Inicio</a></li>
        <li><a href="login.html">Iniciar sesion</a></li>
        <li><a href="registro.html">Registrarse</a></li>
    </ul>
</nav>

<h1>Lista de Pokémon</h1>

<table>
    <form action="login.html" method="get">
    <?php
    // Realiza una solicitud a la PokeAPI para obtener la lista de Pokémon
    $pokemonListData = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=1000");
    $pokemonList = json_decode($pokemonListData, true)['results'];

    // Contador para organizar en filas
    $counter = 0;

    // Genera un botón para cada Pokémon
    foreach ($pokemonList as $pokemon) {
        // Si es el primer botón de la fila, abre una nueva fila en la tabla
        if ($counter % 5 == 0) {
            echo "<tr>";
        }

        $pokemonName = ucfirst($pokemon['name']); // Convierte la primera letra a mayúscula
        $pokemonId = explode('/', rtrim($pokemon['url'], '/'))[count(explode('/', rtrim($pokemon['url'], '/')))-1];
        echo "<td><button type='submit' name='pokemon' value='{$pokemonId}'>{$pokemonName}</button></td>";

        // Si es el último botón de la fila, cierra la fila en la tabla
        if (($counter + 1) % 5 == 0) {
            echo "</tr>";
        }

        $counter++;
    }

    // Si hay botones pendientes para cerrar la fila, ciérralos
    if ($counter % 5 != 0) {
        echo "</tr>";
    }
    ?>
    
    </form>
</table>

</body>
</html>