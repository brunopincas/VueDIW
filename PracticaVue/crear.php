<?php

$server = "localhost";
$user = "root";
$password = "1234";
$db = "dbproducto";

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

  if(isset($_POST['nombre']) && isset($_POST['precio'])){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    if(!empty($nombre) && !empty($precio) && is_numeric($precio)){
      $query = "INSERT INTO producto (nombre, precio) VALUES ('$nombre', '$precio')";

      if(mysqli_query($conexion, $query)){
        echo 'Producto agregado con éxito';
      } else {
        echo 'Error al agregar producto';
      }
    } else {
      echo 'Ingresa todos los campos correctamente';
    }
  }

mysqli_close($conn);
?>