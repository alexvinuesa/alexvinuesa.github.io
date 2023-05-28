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

// Obtención de los datos del formulario
$nomact = $_POST["nomact"];
$descripcio = $_POST["descripcio"];
$date = $_POST["date"];
$hour = $_POST["hour"];
$price = $_POST["price"];
$deporte = $_POST["deporte"];
$telefonoact = $_POST["telefonoact"];
$comunidad = $_POST["comunidad"];
$provincia = $_POST["provincia"];
$municipio = $_POST["municipio"];
$calle = $_POST["calle"];

// Consulta a la base de datos
$sql = "INSERT INTO deporte (nomact, descripcio, date, hour, price, deporte, telefonoact, comunidad, provincia, municipio,calle) 
        VALUES ('$nomact', '$descripcio', '$date', '$hour', '$price', '$deporte', '$telefonoact', '$comunidad', '$provincia', '$municipio','$calle')";

if (mysqli_query($conn, $sql)) {
  echo "Actividad creada correctamente";
  header("Location: ../html/mostrardeporte.php");
            exit();
} else {
  echo "Error al crear la actividad: " . mysqli_error($conn);
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>
