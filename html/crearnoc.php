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
  
    
    <h1>Crear actividad fiesta</h1>
    <form action="../php/crearfiesta.php" method="post">

  <label for="nomact">Nombre de la actividad:</label>
  <input type="text" id="nomact" name="nomact" required><br>
  <label for="tipo">Tipo:</label>
  <select id="tipo" name="tipo" required>
  <?php
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
    $sql = "SELECT * FROM nomfiesta";
    $result = mysqli_query($conn, $sql);

    // Generación de las opciones del campo de selección
    while($row = mysqli_fetch_assoc($result)) {
      echo "<option value=\"" . $row["tipo"] . "\">" . $row["tipo"] . "</option>";
    }

    mysqli_close($conn);
  ?>
  </select><br>
  

  <label for="descripcio">Descripción:</label>
  <input type="text" id="descripcio" name="descripcio" required><br>

  <label for="date">Fecha:</label>
  <input type="date" id="date" name="date" required><br>

  <label for="hour">Hora:</label>
  <input type="time" id="hour" name="hour" required><br>

  <label for="price">Precio:</label>
  <input type="number" id="price" name="price" step="0.00" max="10000" required><br>
  <label for="telefonoact">Telefono:</label>
  <input type="number" id="telefonoact" name="telefonoact">
  <br>
  <label class="titulos">Comunidad Autónoma:</label>
  <select id="comunidad" class="selector" name="comunidad" value="comunidad" selected required></select><br>

  <label class="titulos">Provincia:</label>
  <select id="provincia" class="selector" name="provincia" required></select><br>

  <label class="titulos">Municipios:</label>
  <select id="municipio" class="selector" name="municipio" required></select><br>
  <label for="calle">Calle/Plaza:</label>
  <input type="text" id="calle" name="calle" required><br>


  <button type="submit">Crear actividad</button>
</form>
  </body>
</html>