<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCIAL CONNECTION</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/act.js"></script>
</head>

<body>

<header>
        <?php session_start();?>

        <nav class="navbar navbar-expand-sm navbar-dark bg-black" id="menu">
            <div class="container">
                <a class="navbar-brand" href="portada.php">
                    <img id="logo" src="../images/logo.png" alt="" width="150" height="94">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bx bx-grid-alt"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" aria-current="page" href="#menu">INICIO</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" aria-current="page" href="#servicios">NUESTROS SERVICIOS</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" href="#quienes-somos">QUIENES SOMOS</a>
                        </li>
                        <li class="nav-item ms-4 me-4">
                            <a id="menu" class="nav-link active" href="#formulario">CONTACTO</a>
                        </li>
                        <div class="boton-registrarse">
                          <li class="nav-item">
                            <?php
                            if (!isset($_SESSION['username'])) {
                              echo '<a id="hover" class="nav-link active" href="login.php">INICIAR SESSIÓN</a>';
                            } else {
                              echo '<a id="hover" class="nav-link active" href="login.php">CERRAR SESIÓN</a>';
                              // Destruir la sesión
                              session_destroy();
                            }
                            ?>
                          </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header> 
<br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta a la base de datos
$sql = "SELECT * FROM comida";
$where_clauses = array();
$params = array();

// Componer la consulta SQL final
if (!empty($where_clauses)) {
  $sql .= ' WHERE ' . implode(' AND ', $where_clauses);
}

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die("Error al preparar la consulta: " . mysqli_error($conn));
}

// Bind parameters
if (!empty($params)) {
  $types = str_repeat('s', count($params));
  mysqli_stmt_bind_param($stmt, $types, ...$params);
}

// Ejecutar consulta
$result = mysqli_stmt_execute($stmt);

if (!$result) {
  die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

$result = mysqli_stmt_get_result($stmt);

// Obtener los nombres de las comunidades
$comunidades = array();
$sql_comunidades = "SELECT codigo, nombre FROM comunidades";
$result_comunidades = mysqli_query($conn, $sql_comunidades);
while ($row_comunidades = mysqli_fetch_assoc($result_comunidades)) {
  $codigo = $row_comunidades['codigo'];
  $nombre = $row_comunidades['nombre'];
  $comunidades[$codigo] = $nombre;
}

// Obtener los nombres de las provincias
$provincias = array();
$sql_provincias = "SELECT codigo, nombre FROM provincias";
$result_provincias = mysqli_query($conn, $sql_provincias);
while ($row_provincias = mysqli_fetch_assoc($result_provincias)) {
  $codigo = $row_provincias['codigo'];
  $nombre = $row_provincias['nombre'];
  $provincias[$codigo] = $nombre;
}

$municipios = array();
$sql_municipios = "SELECT codigo, nombre FROM municipios";
$result_municipios = mysqli_query($conn, $sql_municipios);
while ($row_municipios = mysqli_fetch_assoc($result_municipios)) {
  $codigo = $row_municipios['codigo'];
  $nombre = $row_municipios['nombre'];
  $municipios[$codigo] = $nombre;
}

// Procesar el borrado de la actividad
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_actividad_id'])) {
    $actividad_id = $_POST['borrar_actividad_id'];

    $sql_borrar = "DELETE FROM comida WHERE id = ?";
    $stmt_borrar = mysqli_prepare($conn, $sql_borrar);
    mysqli_stmt_bind_param($stmt_borrar, "i", $actividad_id);
    $result_borrar = mysqli_stmt_execute($stmt_borrar);

    if ($result_borrar) {
        // El borrado se realizó exitosamente
        // Redirige al usuario de vuelta a la página admin.php o muestra un mensaje de éxito
        header("Location: admincomida.php");
        exit();
    } else {
        // Error al ejecutar la consulta de borrado
        // Puedes mostrar un mensaje de error o redirigir al usuario a una página de error
        echo "Error al borrar la actividad";
    }
}
?>

<div class="event-container container">
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-4 col-md-6 col-sm-12">';
            echo '<div class="event">';
            echo $row["nomact"] . "<br>";
            echo $row["descripcio"] . "<br>";
            echo $row["date"] . "<br>";
            echo $row["hour"] . "<br>";
            echo $row["price"] . "€" . "<br>";
            echo $row["comida"] . "<br>";

            $codigo_comunidad = $row["comunidad"];
            $nombre_comunidad = isset($comunidades[$codigo_comunidad]) ? $comunidades[$codigo_comunidad] : 'Desconocida';
            echo $nombre_comunidad . "<br>";

            $codigo_provincia = $row["provincia"];
            $nombre_provincia = isset($provincias[$codigo_provincia]) ? $provincias[$codigo_provincia] : 'Desconocida';
            echo $nombre_provincia . "<br>";

            $codigo_municipio = $row["municipio"];
            $nombre_municipio = isset($municipios[$codigo_municipio]) ? $municipios[$codigo_municipio] : 'Desconocida';
            echo $nombre_municipio . "<br>";

            echo '<span>' . $row['calle'] . '</span><br>';

            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="borrar_actividad_id" value="' . $row['id'] . '">';
            echo '<button type="submit" class="btn-borrar">Borrar</button>';
            echo '</form>';

            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
<br><br><br>
<div class="container-fluid mt-5" id="footer">
        <div class="row justify-content-center text-white">
            <div class="col-3">
                <img src="../images/telefono-icono.png" width="30px" alt=""><span class="text-white"> Teléfono</span>
                <p>654 78 96 54</p>
                <p>684 23 89 73</p>
            </div>
            <div class="col-3">
                <img src="../images/correo-icono.png" width="30px" alt=""><span class="text-white"> Correo
                    electrónico</span><br>
                <p>soporte@socialconnection.com</p>
                <p>administracion@socialconnection.com</p>
            </div>
            <div class="col-3">
                <img src="../images/ubicacion-icono.png" width="30px" alt=""><span class="text-white"> Ubicación</span>
                <p>Carrer de Lles, 3, 08207 Sabadell, Barcelona </p>
            </div>
            <div class="col-12">
                <p class="text-center mt-3">© Copyright Social Connection Página Oficial del Social Connection</p>
            </div>
        </div>
    </div>

</body>