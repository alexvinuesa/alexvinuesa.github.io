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
$nomevent = $_POST["nomevent"];
$descripcioevent = $_POST["descripcioevent"];
$dateevent = $_POST["dateevent"];
$hourinici = $_POST["hourinici"];
$hourfinal = $_POST["hourfinal"];
$priceevent = $_POST["priceevent"];
$tipocom = $_POST["tipocom"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$comunidad = $_POST["comunidad"];
$provincia = $_POST["provincia"];
$municipio = $_POST["municipio"];
$calle = $_POST["calle"];
$link = $_POST["link"];
// Lectura de los datos de la imagen
$imagen = $_FILES['imatge']['tmp_name'];
$tamaño = $_FILES['imatge']['size'];

// Verificación de que se haya subido una imagen
if ($imagen != null) {
    // Conversión de la imagen a datos binarios
    $contenido_imagen = addslashes(file_get_contents($imagen));
} else {
    $contenido_imagen = null;
}

// Consulta a la base de datos
$sql = "INSERT INTO comidaevent (nomevent, descripcioevent, dateevent, hourinici,hourfinal, priceevent, comida, imatge, telefono, email, comunidad, provincia, municipio, calle,link) 
        VALUES ('$nomevent', '$descripcioevent', '$dateevent', '$hourinici','$hourfinal', '$priceevent', '$tipocom', '$contenido_imagen', '$telefono', '$email','$comunidad','$provincia','$municipio','$calle','$link')";
        
if (mysqli_query($conn, $sql)) {
    echo "Actividad creada correctamente";
    header("Location: ../html/eventos_gastronomia.php");
    exit();
} else {
    echo "Error al crear la actividad: " . mysqli_error($conn);
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>