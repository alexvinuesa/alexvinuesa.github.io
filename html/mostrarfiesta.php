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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/act.js"></script>

    <style>
      .event {
        padding: 20px;
        margin:20px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        text-align: center;
        transition: transform 0.3s ease;
      }

      .event h3 {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
      }

      .event p {
        font-size: 14px;
        color: #777;
      }

      .event:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }


      @media (max-width: 767px) {
        /* Estilos para dispositivos móviles */
        .event img {
          width: 250px;
          height: 300px;
        }
      }
      .filter-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f2f2f2;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .filter-form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    width: 100%;
    margin: 0 auto;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left:200px;
    margin-right:200px;
  }

  .filter-label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
  }

  .filter-select,
  .filter-input {
    height: 30px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
    width: 200px;
  }

  .filter-submit {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 4px 8px;
    cursor: pointer;
  }




  @media (max-width: 480px) {
    .filter-form {
      flex-direction: column;
      align-items: center;
    }
  }


.filter-submit:hover {
  background-color: #0056b3;
}
    </style>
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
                            <a id="menu" class="nav-link active" aria-current="page" href="portada.php">INICIO</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" aria-current="page" href="eventos_fiesta">VER EVENTOS</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" href="mostrarfiesta">VER ACTIVIDADES</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" href="crearnoc">CREAR ACTIVIDAD</a>
                        </li>
                        <li class="nav-item ms-4 me-4">
                            <a id="menu" class="nav-link active" href="portada.php#formulario">CONTACTO</a>
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
$sql = "SELECT * FROM fiesta";
$where_clauses = array();
$params = array();

// Obtener el valor del menú desplegable para nomdep
$filtro_act = isset($_POST['filtro_act']) ? $_POST['filtro_act'] : 'todos';
if ($filtro_act != 'todos') {
  $where_clauses[] = 'fiesta = ?';
  $params[] = $filtro_act;
}

// Obtener el valor del menú desplegable para comunidad
$filtro_comunidad = isset($_POST['comunidad']) ? $_POST['comunidad'] : 'todos';
if ($filtro_comunidad != 'todos') {
  $where_clauses[] = 'comunidad = ?';
  $params[] = $filtro_comunidad;
}
$filtro_comunidad = isset($_POST['comunidad']) ? $_POST['comunidad'] : 'todos';

$filtro_provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'todos';
if ($filtro_provincia != 'todos') {
  $where_clauses[] = 'provincia = ?';
  $params[] = $filtro_provincia;
}
$filtro_provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'todos';

$filtro_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : 'todos';
if ($filtro_municipio != 'todos') {
  $where_clauses[] = 'municipio = ?';
  $params[] = $filtro_municipio;
}
$filtro_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : 'todos';

$filtro_comunidad = isset($_POST['comunidad']) ? $_POST['comunidad'] : 'todos';
if ($filtro_comunidad != 'todos') {
  $where_clauses[] = 'comunidad = ?';
  $params[] = $filtro_comunidad;
}
$filtro_comunidad = isset($_POST['comunidad']) ? $_POST['comunidad'] : 'todos';

$filtro_provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'todos';
if ($filtro_provincia != 'todos') {
  $where_clauses[] = 'provincia = ?';
  $params[] = $filtro_provincia;
}
$filtro_provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'todos';

$filtro_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : 'todos';
if ($filtro_municipio != 'todos') {
  $where_clauses[] = 'municipio = ?';
  $params[] = $filtro_municipio;
}
$filtro_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : 'todos';


$filtro_precio_min = isset($_POST['filtro_precio_min']) ? $_POST['filtro_precio_min'] : '';
if (!empty($filtro_precio_min)) {
  $where_clauses[] = 'price >= ?';
  $params[] = $filtro_precio_min;
}

$filtro_precio_max = isset($_POST['filtro_precio_max']) ? $_POST['filtro_precio_max'] : '';
if (!empty($filtro_precio_max)) {
  $where_clauses[] = 'price <= ?';
  $params[] = $filtro_precio_max;
}
if ($filtro_precio_max == 0) {
  $where_clauses[] = 'price = 0';
} elseif (!empty($filtro_precio_max)) {
  $where_clauses[] = 'price <= ?';
  $params[] = $filtro_precio_max;
}
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


// Generación del menú desplegable para nomdep
echo '<div class="filter-container">';
echo '<form class="filter-form" method="post">';
echo '<label class="filter-label" for="filtro_act">Filtrar por fiesta:</label>';
echo '<select class="filter-select" name="filtro_act" id="filtro_act">';
echo '<option value="todos">Todos</option>';
$sql2 = "SELECT tipo FROM nomfiesta";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($result2)) {
  $tipo = $row2['tipo'];
  if ($tipo == $filtro_act) {
    echo '<option value="'.$tipo.'" selected>'.$tipo.'</option>';
  } else {
    echo '<option value="'.$tipo.'">'.$tipo.'</option>';
  }
}
echo '</select>';

echo '<label class="filter-label" for="filtro_precio_min">Precio mínimo:</label>';
echo '<input class="filter-input" type="text" name="filtro_precio_min" id="filtro_precio_min" placeholder="" value="'.$filtro_precio_min.'">';

echo '<label class="filter-label" for="filtro_precio_max">Precio máximo:</label>';
echo '<input class="filter-input" type="text" name="filtro_precio_max" id="filtro_precio_max" placeholder="" value="'.$filtro_precio_max.'">';

$selected_comunidad = isset($_POST['comunidad']) ? $_POST['comunidad'] : 'todos';

// Generar el menú desplegable para la comunidad
echo '<label class="filter-label" for="comunidad">Comunidad Autónoma:</label>';
echo '<select class="filter-select" name="comunidad" id="comunidad">';
echo '<option value="todos" ' . ($selected_comunidad == 'todos' ? 'selected' : '') . '>Todos</option>';
foreach ($comunidades as $codigo => $nombre) {
  if ($codigo == $selected_comunidad) {
    echo '<option value="'.$codigo.'" selected>'.$nombre.'</option>';
  } else {
    echo '<option value="'.$codigo.'">'.$nombre.'</option>';
  }
}
echo '</select>';


$filtro_provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'todos';
// Generar el menú desplegable para la provincia
echo '<label class="filter-label" for="provincia">Provincia:</label>';
echo '<select class="filter-select" name="provincia" id="provincia">';
echo '<option value="todos" ' . ($filtro_provincia == 'todos' ? 'selected' : '') . '>Todos</option>';
foreach ($provincias as $codigo => $nombre) {
  if ($codigo == $filtro_provincia) {
    echo '<option value="'.$codigo.'" selected>'.$nombre.'</option>';
  } else {
    echo '<option value="'.$codigo.'">'.$nombre.'</option>';
  }
}
echo '</select>';

$filtro_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : 'todos';
// Generar el menú desplegable para la municipio
echo '<label class="filter-label" for="municipio">Municipio:</label>';
echo '<select class="filter-select" name="municipio" id="municipio">';
echo '<option value="todos" ' . ($filtro_municipio == 'todos' ? 'selected' : '') . '>Todos</option>';
foreach ($municipios as $codigo => $nombre) {
  if ($codigo == $filtro_municipio) {
    echo '<option value="'.$codigo.'" selected>'.$nombre.'</option>';
  } else {
    echo '<option value="'.$codigo.'">'.$nombre.'</option>';
  }
}
echo '</select>';


echo '<button class="filter-submit" type="submit" value="Filtrar"><i class="fas fa-search"></i></button>';
echo '</form>';
echo '</div>';
echo '<br>';echo '<br>';

?>

        <div class="event-container container">

    <?php
    $counter = 0;

    echo '<div class="row">'; // Iniciar la primera fila

    while($row = mysqli_fetch_assoc($result)) {
      echo '<div class="col-lg-4 col-md-6 col-sm-12">';
      echo '<div class="event">';
      echo '<label><strong>Nombre de la actividad:</strong></label> ' . $row["nomact"] . "<br>";
      echo '<label><strong>Descripción:</strong></label> ' . $row["descripcio"] . "<br>";
      echo '<label><strong>Fecha:</strong></label> ' . $row["date"] . "<br>";
      echo '<label><strong>Hora:</strong></label> ' . $row["hour"] . "<br>";
      echo '<label><strong>Precio:</strong></label> ' . $row["price"] . "€" . "<br>";
      echo $row["fiesta"];
      echo "<br>";
      $codigo_comunidad = $row["comunidad"];
      $nombre_comunidad = isset($comunidades[$codigo_comunidad]) ? $comunidades[$codigo_comunidad] : 'Desconocida';
      echo $nombre_comunidad;
      echo "<br>"; $codigo_municipio = $row["municipio"];
      $nombre_municipio = isset($municipios[$codigo_municipio]) ? $municipios[$codigo_municipio] : 'Desconocida';
      echo $nombre_municipio;
      echo ' , ';
      $codigo_provincia = $row["provincia"];
      $nombre_provincia = isset($provincias[$codigo_provincia]) ? $provincias[$codigo_provincia] : 'Desconocida';
      echo $nombre_provincia;
      
      echo "<br>";
      echo '<span>'.$row['calle'].'</span>';
      echo "<br>";
      echo '<a href="mostraractividadfiesta.php?id='.$row['id'].'"><button>Unirse</button></a>';
      echo "<br>";
      echo "<br>";
      echo '</div>';
      echo '</div>';

      $counter++;

      if ($counter % 3 === 0) {
        echo '</div><div class="row">'; // Cerrar la fila y abrir una nueva cada 3 eventos (para pantallas grandes)
      }
    }

    echo '</div>'; // Cerrar la última fila
    ?>

    </div>

</div>

<br><br>
    <div class="container-fluid" id="footer">
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
</html>