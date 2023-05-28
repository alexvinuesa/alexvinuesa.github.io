<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Crear actividad</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/act.js"></script>
    <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #333;
      text-align: center;
      margin-top: 30px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 4px;
      padding: 20px;
      box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="number"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 15px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    select.selector {
      height: 40px;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    .titulos {
      font-weight: bold;
      margin-top: 15px;
      color: #333;
    }
  </style>
  </head>
  <body>
    
    <h1>Crear evento deporte</h1>
    <form action="../php/creareventodep.php" enctype="multipart/form-data" method="post">

  <label for="nomevent">Nombre de evento:</label>
  <input type="text" id="nomevent" name="nomevent" required><br>
  <label for="dateevent">Fecha:</label>
  <input type="date" id="dateevent" name="dateevent" required><br>
  <label for="hourinici">Hora inicio:</label>
  <input type="time" id="hourinici" name="hourinici" required><br>
  <label for="hourfinal">Hora final:</label>
  <input type="time" id="hourfinal" name="hourfinal" required><br>
  <label for="priceevent">Precio:</label>
  <input type="number" id="priceevent" name="priceevent" step="0.00" max="1000000" required><br>
  <label for="deporte">Deporte:</label>
  <select id="deporte" name="deporte" required>
  <?php
    //foto,nombre evento, ubicacion, tipo(base de datos), opcional en discos (DJ),precio, descripcion, telefono/mail opcional, fecha, hora inicio - final.
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Conexión fallida: " . mysqli_connect_error());
    }

    // Consulta a la base de datos
    $sql = "SELECT * FROM nomdep";
    $result = mysqli_query($conn, $sql);

    // Generación de las opciones del campo de selección
    while($row = mysqli_fetch_assoc($result)) {
      echo "<option value=\"" . $row["nombres"] . "\">" . $row["nombres"] . "</option>";
    }

    mysqli_close($conn);
  ?>
  </select><br>
  
 
  <label for="descripcioevent">Descripción:</label>
  <input type="text" id="descripcioevent" name="descripcioevent" required><br>
  <label for="imatge">Imagen:</label><br><br>
  <input type="file" name="imatge">
  <br><br>
  <label for="telefono">Telefono:</label>
  <input type="number" id="telefono" name="telefono"><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>
  <label class="titulos">Comunidad Autónoma:</label>
  <select id="comunidad" class="selector" name="comunidad" value="comunidad" selected required></select><br>
  <label class="titulos">Provincia:</label>
  <select id="provincia" class="selector" name="provincia" required></select><br>
  <label class="titulos">Municipios:</label>
  <select id="municipio" class="selector" name="municipio" required></select><br>
  <label for="calle">Calle/Plaza:</label>
  <input type="text" id="calle" name="calle" required><br>
  <label for="link">Link:</label>
  <input type="text" id="link" name="link" required>
  <br>


  <button type="submit">Crear actividad</button>
</form>
  </body>
</html>

