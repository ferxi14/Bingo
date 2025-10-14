<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Juego Bingo</title>
  <link rel=stylesheet href="css/estilo.css">
</head>
<body>
  <h1>Introduce los nombres de los 4 jugadores</h1>

<form action="control/logica_bingo.php" method="post">
  <label for="jugador1">Jugador 1:</label>
  <input type="text" id="jugador1" name="jugador1" required><br><br>

  <label for="jugador2">Jugador 2:</label>
  <input type="text" id="jugador2" name="jugador2" required><br><br>

  <label for="jugador3">Jugador 3:</label>
  <input type="text" id="jugador3" name="jugador3" required><br><br>

  <label for="jugador4">Jugador 4:</label>
  <input type="text" id="jugador4" name="jugador4" required><br><br>

  <button type="submit">Guardar jugadores</button>
</form>
</body>
</html>