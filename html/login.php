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
                                <a id="hover" class="nav-link active" href="register.php">REGISTRARSE</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $login = $_POST['login'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM ci_usuari WHERE login = '$login' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['login'];
        $_SESSION['admin'] = $row['admin'];

        // Redireccionar según el valor de "admin"
        if ($row['admin'] === '0') {
            header("Location: portada.php");
            exit();
        } elseif ($row['admin'] === '1') {
            header("Location: empresa.php");
            exit();
        } elseif ($row['admin'] === '2') {
            header("Location: admin.php");
            exit();
        }
    } else {
        echo "Credenciales de inicio de sesión inválidas.";
    }

    $conn->close();
}
?>
<center>
<br><br><br><br>
<h1>Iniciar sesión</h1>
<br>
<form method="POST" action="">
    <input type="text" name="login" placeholder="Nombre de usuario" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <br>
    <button type="submit">Iniciar sesión</button>
    <br><br>
    
</form>    
<a href="register.php">No tinenes cuenta? Registrate aqui</a>
<br><br><br><br><br><br>

</center>
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
