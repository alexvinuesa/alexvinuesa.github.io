<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">

    <style>
        /* Estilos adicionales aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        form {
            text-align: center;
            margin-top: 20px;
        }
        
        input[type="submit"] {
            background-color: #ffcc00;
            color: #000;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        input[type="submit"]:hover {
            background-color: #f0bb00;
        }
    </style>
</head>
<body>

     
    <div class="container">
        <header>
            <h1>Panel Admin</h1>
        </header>

        <form method="POST" action="">
            <input type="submit" name="salir" value="Cerrar sesión">
        </form>

        <h1>Actividades</h1>
        <a href="admincomida" class="btn">Borrar actividad comida</a>
        <a href="adminfiesta" class="btn">Borrar actividad fiesta</a>
        <a href="admindeporte" class="btn">Borrar actividad deporte</a>

        <h1>Eventos</h1>
        <a href="admincomidaev" class="btn">Borrar evento comida</a>
        <a href="adminfiestaev" class="btn">Borrar evento fiesta</a>
        <a href="admindeporteev" class="btn">Borrar evento deporte</a>
    </div>
</body>
</html>
