<!DOCTYPE html>
<html>
<head>
	<title>Ingresar un Vehiculo</title>
	<meta charset="UTF-8">
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
                    <li><a href="registro.php">REGISTAR VEHICULO</a></li>
                </ul>
            </nav>
        </div>
    </header>
	<section class="formVehiculo">
		<h1>Actualizar un Vehiculo</h1>
		<h2>Eres Perfil Supervisor</h2>
		<div class="containerActV">
			<div class="form-wrapper">
				<form action="cingreso.php" method="POST">
					<input hidden type="text" id="id" name="id" required value="<?php echo $_GET['id_reg_vehiculo']; ?>">

					<div class="form-group">
						<label for="nombre">Nombres:</label>
						<input type="text" id="nombre" name="nombre" required value="<?php echo $_GET['nom_clientes']; ?>">
					</div>
					<div class="form-group">
						<label for="apellido">Apellidos:</label>
						<input type="text" id="apellido" name="apellido" required value="<?php echo $_GET['ape_clientes']; ?>">
					</div>
					<div class="form-group">
						<label for="documento">Documento Identidad:</label>
						<input type="text" id="documento" name="documento" required value="<?php echo $_GET['ced_clientes']; ?>">
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						<input type="text" id="telefono" name="telefono" required value="<?php echo $_GET['tel_clientes']; ?>">
					</div>
					<div class="form-group">
						<label for="tipo_vehiculo">Tipo de Vehículo:</label>
						<select id="tipo_vehiculo" name="tipo_vehiculo" required>
							<?php cargarTiposVehiculo($_GET['id_tipo_vehiculo']); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="numero_placa">Número de Placa:</label>
						<input type="text" id="numero_placa" name="numero_placa" required value="<?php echo $_GET['placa_veh_clientes']; ?>">
					</div>

					<div class="form-group">
						<label for="id_placa_vehiculo">id_placa_vehiculo:</label>
						<select id="id_placa_vehiculo" name="id_placa_vehiculo" required>
							<?php cargarPlacaVehiculo($_GET['id_placa_vehiculo ']); ?>
						</select>
					</div>
					<!--button type="button" id="Eliminar" class="btn btn-danger">Eliminar </button>
					<button type="button" id="Buscar" class="btn btn-danger">Buscar </button>
					<button type="button" id="Modificar" class="btn btn-danger">Modificar </button--> 
						<button type="submit" class="btn btn-success" name="actualizarRegistro">Actualizar</button> 
					</form>


				</div>

			</div>

			<h3>Terminos y Condiciones del Servicio</h3>
	</section>


        <?php 
        function cargarTiposVehiculo($valorActualizar = null) {
        	include 'conexion.php';

    // Consulta para obtener los valores de la tabla tipo_vehiculo
        	$query = "SELECT id_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo";
        	$result = $conn->query($query);

    // Generar las opciones del select
        	if ($result->num_rows > 0) {
        		while ($row = $result->fetch_assoc()) {
        			$id = $row["id_tipo_vehiculo"];
        			$nombre = $row["tipo_vehiculo"];

            // Verificar si el valor coincide con $valorActualizar y seleccionarlo en el campo select
        			if ($valorActualizar === $id) {
        				echo "<option value='$id' selected>$nombre</option>";
        			} else {
        				echo "<option value='$id'>$nombre</option>";
        			}
        		}
        	}
        }


        function cargarPlacaVehiculo($valorActualizar = null) {
        	include 'conexion.php';

    // Consulta para obtener los valores de la tabla tipo_vehiculo
        	$query = "SELECT * FROM clientes";
        	$result = $conn->query($query);

    // Generar las opciones del select
        	if ($result->num_rows > 0) {
        		while ($row = $result->fetch_assoc()) {
        			$id = $row["id_clientes"];
        			$placa = $row["placa_vehiculo"];
        			
            // Verificar si el valor coincide con $valorActualizar y seleccionarlo en el campo select
        			if ($valorActualizar === $id) {
        				echo "<option value='$id' selected>$placa</option>";
        			} else {
        				echo "<option value='$id'>$placa</option>";
        			}
        		}
        	}
        }
        ?>

    </body>
    </html>

