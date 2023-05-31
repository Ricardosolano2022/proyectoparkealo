<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>INICIO SESION</title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="caja">
                <img src="Imagenes/logoParking3.png" alt="Logo del parqueadero">
                <nav >
                    <ul>
                        <li><a href="paginaPrincipal.php">HOME</a></li>
                        <li><a>COCTACTOS</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class="datos">
            <div class="container">
                <form method="POST">
                <h2>Iniciar Sesión</h2>
                <div class="input-group">
                    <label for="username">Email o Usuario</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login">Iniciar sesión</button>
                <button>Registrar</button>
                </form>
            </div>
        </section>

        <?php
            include 'conexion.php';


            if (isset($_POST['login'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                // Preparar la consulta con una cláusula WHERE para verificar el usuario y la contraseña
                $query = "SELECT * FROM login WHERE cedula = '$user' AND clave = '$pass'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    header("Location: pagAdmin.php"); // Redireccionar a la página principal
                    exit; 
                } else {
                    echo '<script>alert("Usuario y/o contraseña incorrectos");</script>';
                }
            }

            $conn->close();
?>




    </body>
</html>