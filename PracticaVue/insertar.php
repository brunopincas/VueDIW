<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$database = new mysqli("localhost", "root", "1234", "dbproducto");

$data = json_decode(file_get_contents("php://input"));

if (json_last_error() === JSON_ERROR_NONE) {
    $nombre = $database->real_escape_string($data->nombre);
    $precio = $database->real_escape_string($data->precio);
} else {
    http_response_code(400);
    header("Content-Type: application/json");
    die(json_encode(array("message" => "El contenido enviado no es un JSON valido." ,"nombre"=>$data->nombre,"precio"=>$data->precio)));
}

$query = "INSERT INTO producto (nombre, precio)
VALUES ('$nombre', '$precio')";

if ($database->query($query)) {
  http_response_code(201);
  header("Content-Type: application/json");
  die(json_encode(array("message" => "Producto creado exitosamente.")));
} else {
  http_response_code(503);
  header("Content-Type: application/json");
  die(json_encode(array("message" => "No se pudo crear el producto.")));
}

$database->close();

?>