<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "dbproducto";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID del producto desde la URL
$id = $_GET['id'];

// Eliminar el registro con el ID especificado
$sql = "DELETE FROM producto WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error al eliminar registro: " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?>
