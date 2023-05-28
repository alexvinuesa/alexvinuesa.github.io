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
      body{
        background-color: black;
      }
      .event {
        padding: 20px;
        margin:20px;
        background-color: #2B2B2A;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        text-align: center;
        transition: transform 0.3s ease;
        color: white;
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

      .event img {
        width: 100%;
        height: 400px;
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
        background-color: #2B2B2A ;
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
    color: white;
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
.containerbot {
  display: flex;
  justify-content: center;
}

.ver-mas {
  padding: 10px 20px;
  background-color: #2B2B2A;
  color: white;
  border: 1px solid black;
  border-radius: 5px;
  font-size: 16px;
  text-decoration: none;
  text-align: center;
  transition: background-color 1s ease; 
  position: relative;
  overflow: hidden;
}

.ver-mas:hover {
  background-color: black;
  color: white;
}


.ver-mas::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background-color: #fff;
  opacity: 0.3;
  transition: left 0.3s ease;
  z-index: 1;
}

.ver-mas:hover::before {
  left: 100%;
}

.ver-mas:hover {
  background-color: white;
  color: black;
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
$sql = "SELECT * FROM fiestaevent";
$where_clauses = array();
$params = array();

// Obtener el valor del menú desplegable para comida
$filtro_act = isset($_POST['filtro_act']) ? $_POST['filtro_act'] : 'todos';
if ($filtro_act != 'todos') {
  $where_clauses[] = 'comida = ?';
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

$filtro_precio_min = isset($_POST['filtro_precio_min']) ? $_POST['filtro_precio_min'] : '';
if (!empty($filtro_precio_min)) {
  $where_clauses[] = 'priceevent >= ?';
  $params[] = $filtro_precio_min;
}

$filtro_precio_max = isset($_POST['filtro_precio_max']) ? $_POST['filtro_precio_max'] : '';
if (!empty($filtro_precio_max)) {
  $where_clauses[] = 'priceevent <= ?';
  $params[] = $filtro_precio_max;
}
if ($filtro_precio_max == 0) {
  $where_clauses[] = 'priceevent = 0';
} elseif (!empty($filtro_precio_max)) {
  $where_clauses[] = 'priceevent <= ?';
  $params[] = $filtro_precio_max;
}

// Componer la consulta SQL final
if (!empty($where_clauses)) {
  $sql .= ' WHERE ' . implode(' AND ', $where_clauses);
}

$sql .= ' LIMIT 3'; // Agregar la cláusula LIMIT para obtener solo 3 eventos

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

// Generación del formulario para los filtros
echo '<div class="filter-container">';
echo '<form class="filter-form" method="post">';
echo '<label class="filter-label" for="filtro_act">Filtrar por fiesta:</label>';
echo '<select class="filter-select" name="filtro_act" id="filtro_act">';
echo '<option value="todos">Todos</option>';
$sql2 = "SELECT tipo FROM nomfiesta";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($result2)) {
  $nombre = $row2['tipo'];
  if ($nombre == $filtro_act) {
    echo '<option value="'.$nombre.'" selected>'.$nombre.'</option>';
  } else {
    echo '<option value="'.$nombre.'">'.$nombre.'</option>';
  }
}
echo '</select>';


// Generar el menú desplegable para la comunidad
// Obtener el valor del menú desplegable para comunidad


echo '<label class="filter-label" for="filtro_precio_min">Precio mínimo:</label>';
echo '<input class="filter-input" type="text" name="filtro_precio_min" id="filtro_precio_min" placeholder="" value="'.$filtro_precio_min.'">';

echo '<label class="filter-label" for="filtro_precio_max">Precio máximo:</label>';
echo '<input class="filter-input" type="text" name="filtro_precio_max" id="filtro_precio_max" placeholder="" value="'.$filtro_precio_max.'">';


// Obtener el valor del menú desplegable para comunidad
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
echo '<br><br>';

echo '<div class="event-container container">';
$counter = 0;

echo '<div class="row">'; // Iniciar la primera fila

while($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-lg-4 col-md-6 col-sm-12">';
  echo '<div class="event">';
  echo '<a href="mostrareventofiesta.php?idevent='.$row['idevent'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['imatge']).'" /></a>';
  echo '<br>';
  echo '<span>'.$row['nomevent'].'</span>';
  echo '<br>';
  echo '<span>'.$row['dateevent'].'</span>';
  echo '<br>';
  echo '<span>'.$row['hourinici'].'</span>';
  echo ' - ';
  echo '<span>'.$row['hourfinal'].'</span>';
  echo '<br>';
  echo '<span>'.$row['priceevent'].'€</span>';
  echo '<br>';
  echo '<span>'.$row['fiesta'].'</span>';
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
  echo '</div>';
  echo '</div>';

  $counter++;

  if ($counter % 3 === 0) {
    echo '</div><div class="row">'; // Cerrar la fila y abrir una nueva cada 3 eventos (para pantallas grandes)
  }
}

echo '</div>'; // Cerrar la última fila
?>

<div class="containerbot">
        <a class="ver-mas" href="eventos_fiesta.php">Ver más</a>
    </div>
    </div>
    </div>
    <div id="creargastronomia" class="container-fluid mt-5 mb-5">
            <div class="row">
                <div id="creargastronomia_texto" class="col-md-6 text-white">
                    <h5>Gastronomia</h5>
                    <h2 class="mt-2">Deleita tu paladar con nuestras experiencias gastronómicas únicas. </h2>
                    <h4 class="mt-2">Únete a nosotros y crea un evento gastronómico inolvidable</h4>
                    <p>Ven como un cliente y vuelve como un amigo.</p>
                    
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <img class="fotogastronomia" src="../images/Rectangle43.png" width="100%" height="100%" alt="">
                </div>
            </div>
    </div>
    <div id="partners" class="container mb-5">
        <h1 class="text-black text-center mb-5">Nuestros partners</h1>
        <div class="row">
            <img class="col-md-3" height="120px" src="../images/partnerdeporte1.png" alt="">
            <img class="col-md-3" height="120px" src="../images/partnerdeporte2.png" alt="">
            <img class="col-md-3 mb-5" height="120px" src="../images/partnerdeporte3.png" alt="">
            <img class="col-md-3 mb-5" height="120px" src="../images/partnerdeporte3.png" alt="">
        </div>
    </div>

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

</html>