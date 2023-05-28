<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Evento</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #000000, #53306A);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .event-details {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 65%;
            padding: 20px;
            display: flex;
            align-items: center;
            color: #ffffff;
        }
        
        .event-details h1 {
            font-size: 24px;
            margin-top: 0;
        }
        
        .event-details img {
            min-width: 300px;
            max-width: 300px;
            min-height:400px;
            max-height:400px;
            margin-right: 20px;
        }
        
        .event-details p {
            font-size: 16px;
            margin: 0 0 10px;
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
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del evento de la URL
    $idevent = $_GET['idevent'];

    // Consulta a la base de datos para obtener los detalles del evento
    $sql = "SELECT * FROM fiestaevent WHERE idevent = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $idevent);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    
    // Mostrar más detalles del evento según tus necesidades

    echo '</div>';

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    ?>
    <div class="event-details">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imatge']); ?>" />
        <div>
        <h1><?php echo $row['nomevent']; ?></h1>
            <p>Fecha: <?php echo $row['dateevent']; ?></p>
            <p>Hora Inicio: <?php echo $row['hourinici']; ?></p>
            <p>Hora final: <?php echo $row['hourfinal']; ?></p>
            <p>Precio: <?php echo $row['priceevent']; ?>€</p>
            <p>Tipo evento: <?php echo $row['fiesta']; ?></p>
            <p>Link: <a href="<?php echo $row['link']; ?>"><?php echo $row['link']; ?></a></p>
        </div>
    </div>
    <br><br><br>
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
