<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$conn = new mysqli("localhost", "root", "1234", "dbproducto");
$data = json_decode(file_get_contents("php://input"));

$id = $conn->real_escape_string($data->id);
$nombre = $conn->real_escape_string($data->nombre);
$precio = $conn->real_escape_string($data->precio);

$conn->query("UPDATE producto SET nombre='$nombre', precio='$precio' WHERE id=$id");

$conn->close();
?>