<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['guardarRegistro'])) {
        guardarRegistro($conn); // Pasar la conexión como parámetro
    }elseif(isset($_POST['actualizarRegistro'])) {
        actualizarRegistro($conn); // Pasar la conexión como parámetro
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['id']) && isset($_GET['eliminarRegistro'])) {
        $id = $_GET['id'];
        eliminarRegistro($id, $conn);
    }if (!empty($_GET['id']) && isset($_GET['mostrarRegistro'])) {
        $id = $_GET['id'];
        mostrarRegistro($id, $conn);
    }
}


function guardarRegistro($conn) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $numero_placa = $_POST['numero_placa'];
    $fecha_actual = date('Y-m-d H:i:s');
    $tipo_vehiculo = $_POST['tipo_vehiculo'];
    $id_placa_vehiculo = $_POST['id_placa_vehiculo'];

    // Guardar los datos en la base de datos
    $sql = "INSERT INTO reg_vehiculo (nom_clientes, ape_clientes, ced_clientes, tel_clientes, placa_veh_clientes, fecha_registro, id_tipo_vehiculo, id_placa_vehiculo) VALUES ('$nombre', '$apellido', '$documento', '$telefono', '$numero_placa', '$fecha_actual', '$tipo_vehiculo', '$id_placa_vehiculo')";

     // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro guardado correctamente";
    } else {
        $mensaje = "Error al guardar el registro: " . $conn->error;
    }

    // Redireccionar a lista.php con el mensaje en la URL
    header("Location: lista.php?mensaje=" . urlencode($mensaje));
    exit(); // Terminar la ejecución del script
}

function eliminarRegistro($id, $conn)
{
    // Escapar el ID para prevenir inyección SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Crear la consulta para eliminar el registro
    $consulta = "DELETE FROM reg_vehiculo WHERE id_reg_vehiculo = '$id'";

    // Ejecutar la consulta
    if ($conn->query($consulta) === TRUE) {
        $mensaje = "Registro eliminado correctamente";
    } else {
        $mensaje = "Error al eliminar el registro: " . $conn->error;
    }

    // Redireccionar a lista.php con el mensaje en la URL
    header("Location: lista.php?mensaje=" . urlencode($mensaje));
    exit(); // Terminar la ejecución del script
}

function mostrarRegistro($id, $conn)
{
    // Obtener el ID del registro a mostrar
    $id = $_GET['id'];

    // Consultar los datos del registro en la base de datos
    $sql = "SELECT * FROM reg_vehiculo WHERE id_reg_vehiculo = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();

        // Codificar los datos como parámetros de consulta
        $params = http_build_query($row);

        // Redirigir a la página actualizar.php con los parámetros de consulta
        header("Location: actualizar.php?$params");
        exit();
    } else {
        echo 'Registro no encontrado';
    }
}

    
function actualizarRegistro($conn)
{
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $numero_placa = $_POST['numero_placa'];
    $fecha_actual = date('Y-m-d H:i:s');
    $tipo_vehiculo = $_POST['tipo_vehiculo'];
    $id_placa_vehiculo = $_POST['id_placa_vehiculo'];

    // Actualizar el registro en la base de datos
    $sql = "UPDATE reg_vehiculo SET nom_clientes = '$nombre', ape_clientes = '$apellido', ced_clientes = '$documento', tel_clientes = '$telefono', placa_veh_clientes = '$numero_placa',fecha_registro = '$fecha_actual', id_tipo_vehiculo = '$tipo_vehiculo', id_placa_vehiculo = '$id_placa_vehiculo' WHERE id_reg_vehiculo = '$id'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro actualizado correctamente";
    } else {
        $mensaje = "Error al actualizar el registro: " . $conn->error;
    }

    // Redireccionar a lista.php con el mensaje en la URL
    header("Location: lista.php?mensaje=" . urlencode($mensaje));
    exit(); // Terminar la ejecución del script
}






// Cerrar la conexión
$conn->close();
?>
