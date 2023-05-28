<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilo.css">
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
</head>
<body>
<header>
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
                            <a id="menu" class="nav-link active" aria-current="page" href="portada.php#menu">INICIO</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" aria-current="page" href="portada.php#servicios">NUESTROS SERVICIOS</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" href="portada.php#quienes-somos">QUIENES SOMOS</a>
                        </li>
                        <li class="nav-item ms-4 me-4">
                            <a id="menu" class="nav-link active" href="portada.php#formulario">CONTACTO</a>
                        </li>
                        <div class="boton-registrarse">
                            <li class="nav-item">
                                <a id="hover" class="nav-link active" href="login.php">INICIAR SESSION</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Variables para almacenar los datos del formulario de registro
$login = "";
$password = "";
$confirmPassword = "";
$correu = "";
$admin = 0;

// Comprobar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $correu = $_POST["correu"];
    
    // Validar los campos del formulario
    if (!empty($login) && !empty($password) && !empty($confirmPassword) && !empty($correu)) {
        if ($password === $confirmPassword) {
            // Insertar los datos del usuario en la base de datos
            $sql = "INSERT INTO ci_usuari (login, password, correu, admin) VALUES ('$login', '$password', '$correu', $admin)";
            
            if ($conn->query($sql) === true) {
                echo "Registro exitoso. ¡Gracias por registrarte!";
                // También puedes redirigir al usuario a otra página aquí si lo deseas
            } else {
                echo "Error al registrar: " . $conn->error;
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuarios</title>
</head>
<body>
    <center>
    <br><br>
    <h2>Registro de usuarios</h2><br>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="login">Nombre de usuario:</label><br>
        <input type="text" name="login" id="login" value="<?php echo $login; ?>"><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password"><br>
        
        <label for="confirm_password">Confirmar contraseña:</label><br>
        <input type="password" name="confirm_password" id="confirm_password"><br>
        
        <label for="correu">Correo electrónico:</label><br>
        <input type="email" name="correu" id="correu" value="<?php echo $correu; ?>"><br>
        <br>
        <input type="submit" value="Registrarse">
    </form>
    <br>
    <a href="login.php">Ya tinenes cuenta? Inicia session</a>
    <br><br><br>
    </center>
</body>
</html>
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
