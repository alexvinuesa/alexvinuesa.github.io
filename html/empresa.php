<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCIAL CONNECTION</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        #gastronomia {
            background-image: url(../images/fotooo.jpg);
        }
        .text{
            margin-left:95px;
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
                            <a id="menu" class="nav-link active" aria-current="page" href="eventos_gastronomia">VER EVENTOS</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a id="menu" class="nav-link active" href="mostrardeporte">VER ACTIVIDADES</a>
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
    <div class="container text-center mt-5" id="servicios">
        <div class="row justify-content-center">
            <h2>CREAR EVENTOS</h2>
            <BR></BR><BR></BR>
            <div class="col-3 text-center" id="deporte">
                <a href="creareventodeporte.php">
                    <h6 id="servicio" class="text-white">DEPORTE</h6>
                </a>
            </div>

            <div class="col-3" id="ocio-nocturno">
                <a href="creareventofiesta.php">
                    <h6 id="servicio" class="text-white">OCIO NOCTURNO</h6>
                </a>
            </div>


            <div class="col-3" id="gastronomia">
                <a href="creareventocomida.php">
                    <h6 id="servicio" class="text-white">GASTRONOMIA</h6>
                </a>
            </div>

        </div>
    </div>
    <BR></BR><BR></BR><BR></BR>

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
                <p class="text-center mt-3">© Derechos de autor Social Connection Página Oficial del Social Connection</p>
            </div>
        </div>
    </div>


</body>

</html>
