<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingresar un Vehiculo</title>
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
                        <li><a href="actualizar.php">ACUALIZAR REGISTRO</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <section class="formRegis">
        <h1>Ingresar un Vehiculo</h1>
        <h2>Eres Perfil Supervisor</h2>
        <div class="containerRegis">
            <div class="form-wrapper">
                <form action="cingreso.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos:</label>
                        <input type="text" id="apellido" name="apellido" required placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento Identidad:</label>
                        <input type="text" id="documento" name="documento" required placeholder="Documento">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" required placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="tipo_vehiculo">Tipo de Vehículo:</label>
                        <select id="tipo_vehiculo" name="tipo_vehiculo" required>
                            <option value=''>[SELECCIONE]</option>;
                            <?php cargarTiposVehiculo(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numero_placa">Número de Placa:</label>
                        <input type="text" id="numero_placa" name="numero_placa" required placeholder="Placa">
                    </div>

                    <div class="form-group">
                        <label for="id_placa_vehiculo">id_placa_vehiculo:</label>
                        <select id="id_placa_vehiculo" name="id_placa_vehiculo" required>
                            <option value=''>[SELECCIONE]</option>;
                            <?php cargarPlacaVehiculo(); ?>
                        </select>
                    </div>
                    <!--button type="button" id="Eliminar" class="btn btn-danger">Eliminar </button>
                    <button type="button" id="Buscar" class="btn btn-danger">Buscar </button>
                    <button type="button" id="Modificar" class="btn btn-danger">Modificar </button--> 
                    <button type="submit" class="btn btn-success" name="guardarRegistro">INGRESAR</button> 
                </form>

                
            </div>
            
        </div>

        <h3>Terminos y Condiciones del Servicio</h3>
    </section>
    <?php 
    function cargarTiposVehiculo() {
    include 'conexion.php';

    // Consulta para obtener los valores de la tabla tipo_vehiculo
    $query = "SELECT id_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo";
    $result = $conn->query($query);

    // Generar las opciones del select
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $id = $row["id_tipo_vehiculo"];
    $nombre = $row["tipo_vehiculo"];
    echo "<option value='$id'>$nombre</option>";
}
}

// Cerrar la conexión a la base de datos
$conn->close();
}

function cargarPlacaVehiculo() {
include 'conexion.php';

// Consulta para obtener los valores de la tabla tipo_vehiculo
$query = "SELECT id_clientes , placa_vehiculo FROM clientes";
$result = $conn->query($query);

// Generar las opciones del select
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$id = $row["id_clientes"];
$placa = $row["placa_vehiculo"];
echo "<option value='$id'>$placa</option>";
}
}

// Cerrar la conexión a la base de datos
$conn->close();
}
?>

</body>
</html>

