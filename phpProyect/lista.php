<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width">
            <title>Lista de Vehiculo</title>
            <link  rel="stylesheet" href="reset.css">
            <link rel="stylesheet" href="style.css">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
                body{
                    background: #888888;
                }
                table {
                    background: #fefefe;
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                th {
                    background-color: #f2f2f2;
                    font-weight: bold;
                }

                tr:hover {
                    background-color: #f5f5f5;
                }

                .no-records {
                    text-align: center;
                    margin-top: 20px;
                }
            </style>
        </head>
    <body>
        <header>
            <div class="caja">
                <img src="Imagenes/logoParking3.png" alt="Logo del parqueadero">
                <nav >
                    <ul>
                        <li><a href="pagAdmin.php">HOME</a></li>
                        <li><a href="actualizar.php">ACTUALIZAR REG_VEH</a></li>
                        <li><a href="registro.php">REGISTAR VEH</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <section class="container">
            <h2>Lista de parqueo</h2>
        </section>
            
        <div >
            <?php
                // Obtener el mensaje de la URL
                $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

                if (!empty($mensaje)) {
                echo '<p>' . htmlspecialchars($mensaje) . '</p>';
                }
            ?>


            <table class="tabla">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Número de Placa</th>
                    <th>Fecha de Registro</th>
                    <th>Tipo de Vehículo</th>
                    <th>ID de Placa de Vehículo</th>
                    <th colspan="2">Opciones</th>
                </tr>

                <?php
                    include 'conexion.php';

                    $query = "SELECT * FROM reg_vehiculo AS rv
                    INNER JOIN clientes AS c ON rv.id_placa_vehiculo = c.id_clientes
                    INNER JOIN tipo_vehiculo AS tv ON tv.id_tipo_vehiculo = rv.id_tipo_vehiculo;";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                        echo '<td>' . $row['id_reg_vehiculo'] . '</td>';
                        echo '<td>' . $row['nom_clientes'] . '</td>';
                        echo '<td>' . $row['ape_clientes'] . '</td>';
                        echo '<td>' . $row['ced_clientes'] . '</td>';
                        echo '<td>' . $row['tel_clientes'] . '</td>';
                        echo '<td>' . $row['placa_veh_clientes'] . '</td>';
                        echo '<td>' . $row['fecha_registro'] . '</td>';
                        echo '<td>' . $row['tipo_vehiculo'] . '</td>';
                        echo '<td>' . $row['placa_vehiculo'] . '</td>';
                        echo '<td><a href="cingreso.php?id=' . $row['id_reg_vehiculo'] . '&eliminarRegistro=1" class="options-button">Eliminar</a>
                            <a href="cingreso.php?id=' . $row['id_reg_vehiculo'] . '&mostrarRegistro=1" class="options-button">Editar</a></td>';
                        echo '</tr>';
                    }
                    } else {
                        echo '<tr><td colspan="10">No se encontraron registros.</td></tr>';
                    }

                    $conn->close();
                ?>
            </table>
        </div>
        <h3>Terminos y Condiciones del Servicio</h3>

    </body>
</html>

